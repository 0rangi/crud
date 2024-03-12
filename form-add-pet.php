<?php
    require_once 'init.php';
    $PDO = db_connect();
    $sql = "SELECT id_tipo, descr_tipo FROM tipo ORDER BY descr_tipo ASC";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="estilo.css" rel="stylesheet">
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <div id="menu"></div>
    </div>
    <div class="container">
        <div class="jumbotron">
            <p class="h3 text-center">Cadastro de pets</p>
        </div>
        <form action="addPet.php" method="post">
            <div class="form-group">
                <label for="descricao">Descrição: </label>
                <input type="text" class="form-control" name="descricao" id="descricao" required minlength="5" placeholder="Informe a descricao do Pet">
            </div>
            <div class="form-group">
                <label for="selectTipo">Selecione o tipo da Pet</label>
                <select class="form-control" name="selectTipo" id="selectTipo" required>

                  <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

                        <option value=" <?php echo $dados['id_tipo'] ?> "> <?php echo $dados['descr_tipo'] ?> </option>
                      
                  <?php endwhile; ?>

                </select>
              </div>
              <div class="form-group">
                <label for="idade">insira a idade</label>
                <input type="number" class="form-control" name="descricao" id="idade" placeholder="1">
              
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <a class="btn btn-danger" href="index.html">Cancelar</a>
              </div>
          </form>
    </div>
    <div class="container">
        <div class="card-footer">
            <p></p>
        </div>
    </div>
</body>
</html>