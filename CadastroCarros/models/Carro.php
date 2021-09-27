<?php

class Carro {

    private $id;
    private $marca;
    private $modelo;
    private $ano;
    private $preco;



    public function getID(){
        return $this->id;
    }
    public function setID($id){
        $this->id = trim($id);
    }


    public function getMarca() {
        return $this->marca;
    }
    public function setMarca($marca) {
         $this->marca = ucwords(trim($marca));
    }


    public function getModelo(){
        return $this->modelo;
    }
    public function setModelo($modelo){
        $this->modelo = ucwords(trim($modelo));
    }


    public function getAno(){
        return $this->ano;
    }
    public function setAno($ano){
        $this->ano = trim($ano);
    }


    public function getPreco(){
        return $this->preco;
    }
    public function setPreco($preco){
        $this->preco = trim($preco);
    }
}