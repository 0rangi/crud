<?php
    require_once 'init.php';
    $id_tipo = isset($_GET['id_tipo']) ? $_GET['id_tipo'] : null;
    if (empty($id_tipo))
    {
        echo "id_tipo não informado";
        exit;
    }
    $PDO = db_connect();
    $sql = "DELETE FROM tipos WHERE id_tipo = :id_tipo";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_tipo', $id_tipo, PDO::PARAM_INT);
    if ($stmt->execute())
    {
        header('Location: msgSucesso.html');
    }
    else
    {
        echo "Erro ao remover";
        print_r($stmt->errorInfo());
    }
?>