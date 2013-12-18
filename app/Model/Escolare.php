<?php
    class Escolare extends AppModel{
        
        public  $name = "Escolare";
        public $belongsTo = array('Escola');    
        public $sequence = 'public.pessoas_id_seq';
        
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
