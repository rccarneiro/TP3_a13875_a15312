<?php
    require_once "db.php";

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM Treinadores WHERE ID =" . $id;

    $stmt = $PDO->prepare($sql);

    $result = $stmt->execute();

    if (!$result){
        var_dump($stmt->errorInfo());
        exit;
    }

    header('Location: ../trainers_backoffice.php');
 ?>
