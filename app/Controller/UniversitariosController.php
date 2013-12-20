<?php
    class UniversitariosController extends AppController{
        
        public  $name = "Universitarios";
        
        public function index() {
                        $this->paginate = array('limit' => 10);
                        $universitarios = $this->paginate('Universitario');
                        $this->set(compact('universitarios'));
        }
        
        public function add(){
            if ($this->data){
                if($this->Universitario->save($this->data)){
                    $this->Session->setFlash("Estagiario universitario adicionada com sucesso");
                    $this->data = array();
                }
            }
            self::getEscola();
        }
        
        public function edit($id = null){
            if($this->data){
                if ($this->Universitario->save($this->data)) {
                    $this->Session->setFlash("Alteracçõs armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Universitarios', 'action' => 'view',$id));
            }else{
                $this->data = $this->Universitario->read(null, $id);
            }
            self::getEscola();
        }
        
        public function delete($id = null){
            if($id){
                if($this->Universitario->delete($id)){
                    $this->Session->setFlash("Estagiario universitario  excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Universitarios', 'action' => 'index'));
            }
        }
        
        public function view($id = null){
            if($id){
                $universitario = $this->Universitario->read(null, $id);
                $this->set(compact("universitario"));
                           //pr($universitario);exit(0);
            }
        }
        
        public function getEscola(){
            $escolas = $this->Universitario->Escola->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escolas'));
        }
                
       public function getContatos(){
            $contatos = $this->Universitario->Pessoacontato->find('list',array('fields' => array( 'id', 'tipo','contato','descricao')));
            $this->set(compact('contatos'));
        }
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
