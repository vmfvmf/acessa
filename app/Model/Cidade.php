<?php
    class Cidade extends AppModel{
        
        public $actsAs = array('Containable');
        public  $name = "Cidade";
        public $hasMany = array("Escola");
        
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
