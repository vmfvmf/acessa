<?php
    class DiretorecontatosController extends AppController{
        
        public  $name = "Diretorecontatos";
                
        public function add($diretore_id =null, $nome = null){
            $this->Diretorecontato->diretore_id = $diretore_id;
            $this->set(compact('nome'));
            $this->set(compact('diretore_id'));
            if ($this->data){
                if($this->Diretorecontato->save($this->data)){
                    $this->Session->setFlash("Contato adicionado com sucesso!");
                }
                $this->redirect(array('controller' => 'Diretores', 'action' => 'index'));
            }
        }
        
        public function edit($id = null, $nome = null){
            $this->set(compact('nome'));
            if($this->data){
                if ($this->Diretorecontato->save($this->data)) {
                    $this->Session->setFlash("Alterações armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Diretores', 'action' => 'index'));
            }else{
                $this->data = $this->Diretorecontato->read(null, $id);
            }
        }
        
        public function delete($id = null){
            if($id){
                if($this->Diretorecontato->delete($id)){
                    $this->Session->setFlash("Contato excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Diretores', 'action' => 'index'));
            }
        }
        
        public function getUniversitario(){
            $universitario = $this->Universitariocontato->Universitario->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('universitario'));
        }
                
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
