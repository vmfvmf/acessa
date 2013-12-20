<?php
    class EscolasController extends AppController{
        
        public  $name = "Escolas";
        
        public function index() {
                        $this->paginate = array('limit' => 10, 'order' => array( 'Escola.nome' => 'asc'));
                        $escolas = $this->paginate('Escola');
                        
                        $this->set(compact('escolas'));
        }
        
        public function add(){
            if ($this->data){
                if($this->Escola->save($this->data)){
                    $this->Session->setFlash("Escola adicionada com sucesso");
                    $this->data = array();
                }
            }
            self::getCidade();
            self::getUniversitarios();
        }
        
        public function edit($id = null){
            if($this->data){
                if ($this->Escola->save($this->data)) {
                    $this->Session->setFlash("Alteracoes armazenadas com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolas', 'action' => 'view',$id));
            }else{
                $this->data = $this->Escola->read(null, $id);
            }
            self::getCidade();
            self::getUniversitarios();
        }
        
        public function delete($id = null){
            if($id){
                if($this->Escola->delete($id)){
                    $this->Session->setFlash("Escola excluida com sucesso!");
                }
                $this->redirect(array('controller' => 'Escolas', 'action' => 'index'));
            }
        }
        
        public function view($id = null){
            if($id){
                $escola = $this->Escola->read(null, $id);
                $this->set(compact("escola"));
                //pr($escola);exit(0);
            }
        }
        
        public function getEscolares(){
            $escolares = $this->Escola->Escolares->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('escolares'));
        }
        
        public function getUniversitarios(){
            $universitarios = $this->Escola->Universitario->find('list',array('fields' => array( 'id', 'nome')));
            $this->set(compact('universitarios'));
        }
     
        public function getCidade(){
            $cidades = $this->Escola->Cidade->find('list',array('fields'=>array('id','nome')));
            $this->set(compact('cidades'));
        }
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
