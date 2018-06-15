<?php
session_start();
require_once "db.php";
$id = $_POST['id'];
$nome = $_POST['nome'];
$contacto = $_POST['contacto'];
$disponibilidade = $_POST['disponibilidade'];

$sql = 'UPDATE users SET Nome = :nome, Contacto = :contacto, Disponibilidade_ID = :disponibilidade WHERE ID ='.$id;
$stmt = $PDO->prepare( $sql );

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':contacto', $contacto);
$stmt->bindParam(':disponibilidade', $disponibilidade);

$result = $stmt->execute();

if(!$result){
  var_dump($stmt->errorInfo());
  exit;
}

echo $stmt->rowCount() . " Linha inserida com sucesso.";

header('Location:../trainers_backoffice.php');
 ?>
