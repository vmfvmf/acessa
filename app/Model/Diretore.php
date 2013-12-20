<?php
    class Diretore extends AppModel{
        
        public  $name = "Diretore";
        public $actsAs = array('Containable');
        public $hasMany = array('Diretorecontato');
        public $belongsTo = array("Escola");
        public $sequence = 'public.pessoas_id_seq';
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
