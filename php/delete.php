<?php
    require_once "db.php";

    $id = $_REQUEST['id'];

    $sql = "DELETE FROM Users WHERE ID =" . $id;

    $stmt = $PDO->prepare($sql);

    $result = $stmt->execute();

    if (!$result){
        var_dump($stmt->errorInfo());
        exit;
    }

    header('Location: ../users_backoffice.php');
 ?>
