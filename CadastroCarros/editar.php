<?php

require 'config.php';
require 'dao/CarroDAOMySQL.php';


$carroDao = new CarroDAOMySQL($pdo);


$id = filter_input(INPUT_GET, 'id');

if($id){
    $carro = $carroDao->findById($id);
}

?>

<html>
    <head>
        <title>CADASTRO</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Home</a>
        </nav>
        <div class="container" style="margin-top:20px">
            <form action="editar_action.php" method="POST">
                <input type="hidden" name="id" value="<?=$carro->getId();?>" />
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" name="marca" value="<?=$carro->getMarca();?>">
                </div>
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" class="form-control" name="modelo" value="<?=$carro->getModelo();?>">
                </div>
                <div class="form-group">
                    <label>Ano</label>
                    <input type="number" class="form-control" name="ano" value="<?=$carro->getAno();?>">
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" class="form-control" name="preco" value="<?=$carro->getPreco();?>">
                </div>
                <input type="submit" value="Salvar" class="btn btn-success"/>
            </form>
        </div>
    </body>
</html>