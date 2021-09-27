<?php

require 'config.php';
require 'dao/CarroDAOMySQL.php';


$carroDao = new CarroDAOMySQL($pdo);

$id = filter_input(INPUT_POST, 'id');
$marca = filter_input(INPUT_POST, 'marca');
$modelo = filter_input(INPUT_POST, 'modelo');
$ano = filter_input(INPUT_POST, 'ano');
$preco = filter_input(INPUT_POST, 'preco');


if($id && $marca && $modelo && $ano && $preco){
    $carro = new Carro ();
    $carro->setId($id);
    $carro->setMarca($marca);
    $carro->setModelo($modelo);
    $carro->setAno($ano);
    $carro->setPreco($preco);

    $carroDao->update($carro);

    header("Location: index.php");
    exit;
}else{
    header("Location: editar.php");
    exit;
}