<?php
    class Diretorecontato extends AppModel{
        
        public  $name = "Diretorecontato";
        public $belongsTo = array("Diretore");
        public $sequence = 'public.contatos_id_seq';
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
