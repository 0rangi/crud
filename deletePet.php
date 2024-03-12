<?php
    require_once 'init.php';
    $id_pets = isset($_GET['id_pets']) ? $_GET['id_pets'] : null;
    if (empty($id_pets))
    {
        echo "id_pets não informado";
        exit;
    }
    $PDO = db_connect();
    $sql = "DELETE FROM tarefas WHERE id_pets = :id_pets";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id_pets', $id_pets, PDO::PARAM_INT);
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