<?php
    class RegistrodiariosController extends AppController{
        
        public  $name = "Registrodiarios";
                      
        public function index() {
                        $this->paginate = array('limit' => 10, "conditions" => array("created >=" => "now()"), "contain" => false);
                        $registros = $this->paginate('Registrodiario');
                        $this->set(compact('registros'));
        }
        
        public function add(){
            if ($this->data){
                if($this->Registrodiario->save($this->data)){
                    $this->Session->setFlash("Registro diário armazenado com sucesso");
                    $this->data = array();
                }
            }
            self::getEscola();
        }
        
        public function edit($id = null){
            if($this->data){
                if ($this->Registrodiario->save($this->data)) {
                    $this->Session->setFlash("Alterações armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Registrodiarios', 'action' => 'view',$id));
            }else{
                $this->data = $this->Registrodiario->read(null, $id);
            }
            self::getEscola();
        }
        
        public function historico($conds = array()){
            $conditions = array();
            //Transform POST into GET
            if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
                    $filter_url['controller'] = $this->request->params['controller'];
                    $filter_url['action'] = $this->request->params['action'];
                    // We need to overwrite the page every time we change the parameters
                    $filter_url['page'] = 1;

                    // for each filter we will add a GET parameter for the generated url
                    foreach($this->data['Filter'] as $name => $value){
                            if($value){
                                    // You migth want to sanitize the $value here
                                    // or even do a urlencode to be sure
                                    $filter_url[$name] = urlencode($value);
                            }
                     }
                    // now that we have generated an url with GET parameters,
                    // we'll redirect to that page
                    return $this->redirect($filter_url);
        } else {
                // Inspect all the named parameters to apply the filters
                foreach($this->params['named'] as $name => $value){
                        // Dont apply the default named parameters used for pagination
                        if(!in_array($name, array('page','sort','direction','limit'))){
                                    // You migth user a switch here to make special filters
                                    // like "between dates", "greater than", etc
                                    switch($name){
                                        case "detalhes":
                                            $conditions['detalhes ilike '] = '%' . $value . '%';//array(
                                                        //array('Registrodiario.detalhes LIKE' => '%' . $value . '%')
                                                //);
                                         break;
                                         case "escola_id":
                                            $conditions['escola_id =' ] = $value ;//array(
                                                        //array('Registrodiario.escola_id =' =>  $value)
                                                //);
                                         break;
                                        case "criado":
                                            $conditions['created ::date = '] = $value; //array(
                                                        //array('Registrodiario.created =' =>  $value)
                                                //);
                                         break;
                                    }
                                    $this->request->data['Filter'][$name] = $value;
                        }
               }
        }
       $this->Registrodiario->recursive = 0;
       $this->paginate = array(
             'limit' => 10,
             'conditions' => $conditions
        );
       $this->set('registros', $this->paginate());

        // get the possible values for the filters and
        // pass them to the view
        $escolas = $this->Registrodiario->Escola->find('list',array('id','nome'));
        $this->set(compact('escolas'));

        // Pass the search parameter to highlight the text
        $this->set('search', isset($this->params['named']['search']) ? $this->params['named']['search'] : "");

            /*
       $this->paginate = array('limit' => 10, "conditions" => $conds);
                        $registros = $this->paginate('Registrodiario');
                        $this->set(compact('registros'));*/
        self::getEscola();
 }
        
        public function delete($id = null){
            if($id){
                if($this->Registrodiario->delete($id)){
                    $this->Session->setFlash("Registro diário excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Registrodiarios', 'action' => 'index'));
            }
        }
        
        public function view($id = null){
            if($id){
                $registro = $this->Registrodiario->read(null, $id);
                $this->set(compact("registro"));
                self::getEscola();
                           //pr($universitario);exit(0);
            }
        }
        
        public function getEscola(){
            $escolas = $this->Registrodiario->Escola->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escolas'));
        }
                
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
