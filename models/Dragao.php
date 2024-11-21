<?php

require_once("Monstro.php");
    
    class Dragao extends Monstro {

        public function __construct() {
            $this->nome = "Dragão";
            $this->vida = 150;
        }

        public function voar(){
            echo "O Dragão está voando! Seu dano aumentou!\n";
        }

    }