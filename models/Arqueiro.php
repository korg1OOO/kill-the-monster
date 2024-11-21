<?php

require_once("MainCharacter.php");

    class Arqueiro extends MainCharacter {
        protected int $danoFlecha = 10;

        /**
         * Get the value of danoFlecha
         */
        public function getDanoFlecha(): int
        {
                return $this->danoFlecha;
        }

        /**
         * Set the value of danoFlecha
         */
        public function setDanoFlecha(int $danoFlecha): self
        {
                $this->danoFlecha = $danoFlecha;

                return $this;
        }

        public function atacar(Monstro $monstro) {
                $this->setDanoAtaque(rand(15, 60));
                $danoFinal = $this->getDanoFlecha() + $this->getDanoAtaque();
                echo "$this->nome atirou uma flecha causando $danoFinal de dano!\n";
                $monstro->receberDano($danoFinal);
            }
        
    }