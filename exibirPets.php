
<?php
    require 'init.php';
    $PDO = db_connect();


  
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':idade', $idade);
    $stmt->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pets</title>
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
                <p class="h3 text-center">pets </p>
        </div>
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">descrição tarefa</th>
                <th scope="col">descrição tipo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php while ($pets = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <th scope="row"><?php echo $pets['id_tipo'] ?></th>
                    <td><?php echo $pets['descr'] ?></td>
                    <td><?php echo $pets['descr_tipo'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="form-edit-pet.php?id=<?php echo $pets['id_tipo'] ?>">Editar</a>
                        <a class="btn btn-danger" href="deletePet.php?id=<?php echo $pets['id_tipo'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
        </table>
    </div>
    <div class="container">
        <div class="card-footer">
            
        </div>
    </div>
</body>
</html>