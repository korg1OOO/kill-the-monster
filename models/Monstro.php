<?php

    class Monstro {
        protected string $nome;
        protected int $vida;
        protected int $danoAtaque;
        
        public function __construct($nome, $vida) {
                $this->nome = $nome;
                $this->vida = $vida;
                $this->danoAtaque = 0;
        }

        public function atacar() {
                $this->setDanoAtaque(rand(5, 25));
                return "$this->nome atacou causando $this->danoAtaque de dano!";
            }
        
        public function receberDano($dano) {
                $this->vida -= $dano;
        }

        /**
         * Get the value of nome
         */
        public function getNome(): string
        {
                return $this->nome;
        }

        /**
         * Set the value of nome
         */
        public function setNome(string $nome): self
        {
                $this->nome = $nome;

                return $this;
        }

        /**
         * Get the value of vida
         */
        public function getVida(): int
        {
                return $this->vida;
        }

        /**
         * Set the value of vida
         */
        public function setVida(int $vida): self
        {
                $this->vida = $vida;

                return $this;
        }

        /**
         * Get the value of danoAtaque
         */
        public function getDanoAtaque(): int
        {
                return $this->danoAtaque;
        }

        /**
         * Set the value of danoAtaque
         */
        public function setDanoAtaque(int $danoAtaque): self
        {
                $this->danoAtaque = $danoAtaque;

                return $this;
        }

    }