<?php
    require_once 'init.php';
    $id_tipo = isset($_POST['id_tipo']) ? $_POST['id_tipo'] : null;
    $descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
    $tipo = isset($_POST['selectTipo']) ? $_POST['selectTipo'] : null;
    $idade = isset($_POST['idade']) ? $_POST['idade'] : null;

    // validação (bem simples, só pra evitar dados vazios)
    if (empty($descricao) || empty($tipo) || empty($idade))
    {
        echo "Volte e preencha todos os campos";
        exit;
    }
    $PDO = db_connect();
    $sql = "UPDATE tarefas SET descricaoTarefa = :descricao, idade = :idade, tipo = :tipo WHERE id_tipo = :id_tipo";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':idade', $idade);
    $stmt->bindParam(':tipo', $tipo);
    $stmt->bindParam(':tipo', $tipo, PDO::PARAM_INT);
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