<?php

require_once("MainCharacter.php");

    class Mago extends MainCharacter {
        protected int $danoMagico = 15;

        /**
         * Get the value of danoMagico
         */
        public function getDanoMagico(): int
        {
                return $this->danoMagico;
        }

        /**
         * Set the value of danoMagico
         */
        public function setDanoMagico(int $danoMagico): self
        {
                $this->danoMagico = $danoMagico;

                return $this;
        }

        public function atacar(Monstro $monstro) {
                $danoFinal = $this->danoMagico + $this->danoAtaque;
                echo "$this->nome lançou um feitiço causando $danoFinal de dano!\n";
                $monstro->receberDano($danoFinal);
        
        }
    }