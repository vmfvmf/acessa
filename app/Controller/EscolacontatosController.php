<?php
    class EscolacontatosController extends AppController{
        
        public  $name = "Escolacontatos";
                
        public function add($escola_id =null, $nome = null){
            $this->set(compact('nome'));
            $this->set(compact('escola_id'));
            if ($this->data){
                if($this->Escolacontato->save($this->data)){
                    $this->Session->setFlash("Contato adicionado com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolas', 'action' => 'index'));
            }
        }
        
        public function edit($id = null, $nome = null){
            $this->set(compact('nome'));
            if($this->data){
                if ($this->Escolacontato->save($this->data)) {
                    $this->Session->setFlash("Alterações armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolas', 'action' => 'index'));
            }else{
                $this->data = $this->Escolacontato->read(null, $id);
            }
        }
        
        public function delete($id = null){
            if($id){
                if($this->Escolacontato->delete($id)){
                    $this->Session->setFlash("Contato excluido com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolas', 'action' => 'index'));
            }
        }
        
        public function getEscolas(){
            $escola = $this->Escolacontato->Escola->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escola'));
        }
                
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
