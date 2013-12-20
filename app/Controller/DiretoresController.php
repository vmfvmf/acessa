<?php
    class DiretoresController extends AppController{
        
        public  $name = "Diretores";

        public function index() {
                  $this->paginate = array('limit' => 10);
                        $diretores = $this->paginate('Diretore');
                        $this->set(compact('diretores'));
                                                   //pr($diretores);exit(0);
        }
        
        public function add($escola_id = null, $escola_nome = null){
            $this->set(compact("escola_id","escola_nome"));
            if ($this->data){
                if($this->Diretore->save($this->data)){
                    $this->Session->setFlash("Diretor adicionado com sucesso");
                    $this->data = array();
                }
            }
            self::getEscola();
        }
        
        public function edit($id = null){
            if($this->data){
                if ($this->Diretore->save($this->data)) {
                    $this->Session->setFlash("Alterações armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Diretores', 'action' => 'view',$id));
            }else{
                $this->data = $this->Diretore->read(null, $id);
            }
            self::getEscola();
        }
        
        public function delete($id = null){
            if($id){
                if($this->Diretore->delete($id)){
                    $this->Session->setFlash("Diretor excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Diretores', 'action' => 'index'));
            }
        }
        
        public function view($id = null){
            if($id){
                $diretore = $this->Diretore->read(null, $id);
                $this->set(compact("diretore"));
            }
        }
        
        public function getEscola(){
            $escola = $this->Diretore->Escola->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escola'));
        }
        
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
