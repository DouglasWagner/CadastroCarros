<?php

require 'config.php';
require 'dao/CarroDAOMySQL.php';

$carroDao = new CarroDAOMySQL($pdo);

$marca = filter_input(INPUT_POST, 'marca');
$modelo = filter_input(INPUT_POST, 'modelo');
$ano = filter_input(INPUT_POST, 'ano');
$preco = filter_input(INPUT_POST, 'preco');

if($marca && $modelo && $ano && $preco){

    $novoCarro = new Carro();
    $novoCarro->setMarca($marca);
    $novoCarro->setModelo($modelo);
    $novoCarro->setAno($ano);
    $novoCarro->setPreco($preco);

    $carroDao->add($novoCarro);

    header("Location: index.php");
    exit;

}else{
    header("Location: cadastrar.php");
   exit;
}

