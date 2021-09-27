<?php
require 'config.php';
require 'dao/CarroDAOMySQL.php';


$carroDao = new CarroDAOMySQL($pdo);

$id = filter_input(INPUT_GET,'id');

if($id){
    $carroDao->delete($id);
}

header("Location: index.php");
exit;