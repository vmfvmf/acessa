<?php
    class RegistrodiariosController extends AppController{
        
        public  $name = "Registrodiarios";
                      
        public function index() {
                        $this->paginate = array('limit' => 10, "conditions" => array("created >=" => "now()"));
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
