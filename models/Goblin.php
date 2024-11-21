<?php

require_once("Monstro.php");

    class Goblin extends Monstro {

        public function __construct() {
            $this->nome = "Goblin";
            $this->vida = 80;
        }

        public function roubar(){
            echo "O Goblin roubou 5 moedas de ouro!\n";
        }

    }