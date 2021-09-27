<?php
require 'config.php';
require 'dao/CarroDAOMySQL.php';


$carroDao = new CarroDAOMySQL($pdo);
$lista = $carroDao->read();

?>
<html>
    <head>
        <title>VEICULOS</title>
        <link rel="stylesheet" href="style.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta charset="UTF-8">
    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Home</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" >
                    <li class="nav-item" >
                        <button onclick="window.location.href='cadastrar.php'" type= "submit" class="btn btn-success " >CADASTRAR CARRO</a>
                    </li>
                </ul>
            </div>
        </nav>
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Marca</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Ano</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Excluir</th>
                </tr>
            </thead>
            <?php foreach($lista as $carro): ?>
            <tbody>
                <tr>
                    <td><?=$carro->getId();?></th>
                    <td><?=$carro->getMarca();?></td>
                    <td><?=$carro->getModelo();?></td>
                    <td><?=$carro->getAno();?></td>
                    <td><?=$carro->getPreco();?></td>
                    <td>
                        <button onclick="window.location.href='editar.php?id=<?=$carro->getId();?>'" type= "submit" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <button onclick="window.location.href='excluir.php?id=<?=$carro->getId();?>'" type= "submit" class="btn btn-danger">Excluir</a>
                    </td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
    </body>
</html>