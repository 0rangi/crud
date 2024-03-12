<?php
    require_once 'init.php';
    $id_tipo = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    if (empty($descricao))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE tipos SET descr_tipo = :descricao WHERE id_tipo = :id_tipo";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':id_tipo', $id_tipo, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: msgSucesso.html');
    }
    else
    {
        echo "Erro ao alterar!";
        print_r($stmt->errorInfo());
    }
?>
<!-- okok -->