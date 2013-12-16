<?php
    class EscolaresController extends AppController{
        
        public  $name = "Escolares";

        public function index() {
                  $this->paginate = array('limit' => 10);
                        $escolares = $this->paginate('Escolare');
                        $this->set(compact('escolares'));
        }
        
        public function add($escola_id = null){
            $this->set(compact("escola_id"));
            if ($this->data){
                if($this->Escolare->save($this->data)){
                    $this->Session->setFlash("Estagiário escolar adicionada com sucesso");
                    $this->data = array();
                }
            }
            self::getEscola();
        }
        
        public function edit($id = null){
            if($this->data){
                if ($this->Escolare->save($this->data)) {
                    $this->Session->setFlash("Alterações armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolares', 'action' => 'index'));
            }else{
                $this->data = $this->Escolare->read(null, $id);
            }
            self::getEscola();
        }
        
        public function delete($id = null){
            if($id){
                if($this->Escolare->delete($id)){
                    $this->Session->setFlash("Estagiario escolar excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolares', 'action' => 'index'));
            }
        }
        
        public function view($id = null){
            if($id){
                $escolar = $this->Escolare->read(null, $id);
                $this->set(compact("escolar"));
                self::getEscola();
                           //pr($escolar);exit(0);
            }
        }
        
        public function getEscola(){
            $escola = $this->Escolare->Escola->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escola'));
        }
        
        public function getUniversitarios(){
            $universitarios = $this->Escola->Universitario->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('universitarios'));
        }
        
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
