<?php
    class Universitariocontato extends AppModel{
        
        public  $name = "Universitariocontato";
        public $belongsTo = array("Universitario");
        public $sequence = 'public.contatos_id_seq';
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
