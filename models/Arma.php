<?php

class Arma {
    protected $nome;
    protected $dano;

    public function __construct($nome, $dano){
        $this->nome = $nome;
        $this->dano = $dano;
    }

    public function __toString()
    {
        return "$this->nome";
    }

    public function setDano($dano){
        
        $this->dano = $dano;
        return $this;
    }

    public function getDano(){
        return $this->dano;
    }

}