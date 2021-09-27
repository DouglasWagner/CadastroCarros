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
            <form action="cadastro_action.php" method="POST">
                <div class="form-group">
                    <label>Marca</label>
                    <input type="text" class="form-control" name="marca">
                </div>
                <div class="form-group">
                    <label>Modelo</label>
                    <input type="text" class="form-control" name="modelo">
                </div>
                <div class="form-group">
                    <label>Ano</label>
                    <input type="number" class="form-control" name="ano">
                </div>
                <div class="form-group">
                    <label>Preço</label>
                    <input type="number" class="form-control" name="preco">
                </div>
                <input type="submit" value="Salvar" class="btn btn-success"/>
            </form>
        </div>
    </body>
</html>