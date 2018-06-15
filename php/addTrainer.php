<?php
if ($_POST) {

	if(empty($_POST["nome"])){
		$nomeErr = "nome is a required field!";
	} else {
		$nome = test_input($_POST["nome"]);
	}

	if(empty($_POST["contacto"])){
		$contactoErr = "contacto is a required field!";
	} else {
		$contacto = test_input($_POST["contacto"]);
	}

	if(empty($_POST["disponibilidade"])){
		$disponibilidadeErr = "disponibilidade is a required field!";
	} else {
		$disponibilidade = test_input($_POST["disponibilidade"]);
	}
	if ((!empty($nome)) && (!empty($contacto)) && (!empty($disponibilidade))) {
		?>
		<h2>Results of submitted form:</h2>
		<ul>
			<li><b>Nome: </b><?=$nome;?></li>
			<li><b>Contacto: </b><?=$contacto;?></li>
			<li><b>Disponibilidade: </b><?=$disponibilidade;?></li>
		</ul>
		<?
	}
}
function test_input($data){
	$data = trim($data);
	$data = stripslashes ($data);
	$data = htmlspecialchars($data);
	return $data;
}

require_once "db.php";

$sql = "INSERT INTO Treinadores (Nome,Contacto, Disponibilidade_ID) VALUES(:nome, :contacto, :disponibilidade)";
$stmt = $PDO->prepare( $sql );

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':contacto', $contacto);
$stmt->bindParam(':disponibilidade', $disponibilidade);
$result = $stmt->execute();

if (!$result){
	var_dump($stmt->errorInfo());
	exit;
}

header('Location:../trainers_backoffice.php');

?>
