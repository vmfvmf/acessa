<?php
    class Escola extends AppModel{
        
        public  $name = "Escola";
        public $hasMany = array("Escolares","Escolacontato");
        public $belongsTo = array("Universitario","Cidade");
    }
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
