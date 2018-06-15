<?php
require_once "db.php";
session_start();

$sql = "UPDATE Treinadores SET Foto=:foto, Nome=:nome, Email=:email, Role=:role, Status=:status WHERE ID =" . $id;
$stmt = $PDO->prepare( $sql );

$stmt->bindParam(':foto', $uploaded_file);
$stmt->bindParam(':nome', $name);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':role', $role);
$stmt->bindParam(':status', $status);

$result = $stmt->execute();

if(!$result){
  var_dump($stmt->errorInfo());
  exit;
}

echo $stmt->rowCount() . " Linha inserida com sucesso.";

header('Location: index.php');
 ?>
