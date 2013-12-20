<?php
    class Universitario extends AppModel{
        
        public $name = "Universitario";
        public $actsAs = array('Containable');
        public $hasMany = array("Escola","Universitariocontato");
        public $sequence = 'public.pessoas_id_seq';
        //public $belongsTo = array("Pessoacontato");
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
