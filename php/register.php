<?php
if ($_POST) {

	if(empty($_POST["nome"])){
		$nomeErr = "nome is a required field!";
	} else {
		$nome = test_input($_POST["nome"]);
	}
	if(empty($_POST["email"])){
		$emailErr = "E-mail is a required field!";
	} else {
		$email = test_input($_POST["email"]);
	}
	if(empty($_POST["password"])){
		$passwordErr = "password is a required field!";
	} else {
		$password = test_input($_POST["password"]);
	}
	if(empty($_POST["contacto"])){
		$contactoErr = "contacto is a required field!";
	} else {
		$contacto = test_input($_POST["contacto"]);
	}
	if(empty($_POST["peso"])){
		$pesoErr = "peso is a required field!";
	} else {
		$peso = test_input($_POST["peso"]);
	}
	if(empty($_POST["altura"])){
		$alturaErr = "altura is a required field!";
	} else {
		$altura = test_input($_POST["altura"]);
	}
	if ((!empty($nome)) && (!empty($email)) && (!empty($password)) && (!empty($contacto)) && (!empty($peso)) && (!empty($altura))) {
		?>
		<h2>Results of submitted form:</h2>
		<ul>
			<li><b>Nome: </b><?=$nome;?></li>
			<li><b>E-mail: </b><?=$email;?></li>
			<li><b>Password: </b><?=$password;?></li>
			<li><b>Contacto: </b><?=$contacto;?></li>
			<li><b>Peso: </b><?=$peso;?></li>
			<li><b>Altura: </b><?=$altura;?></li>
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



$sql = "INSERT INTO Users (Nome, Email, Password, Contacto, Peso, Altura) VALUES(:nome, :email, :password, :contacto, :peso, :altura)";
$stmt = $PDO->prepare( $sql );

$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':password', md5($password));
$stmt->bindParam(':contacto', $contacto);
$stmt->bindParam(':peso', $peso);
$stmt->bindParam(':altura', $altura);

$result = $stmt->execute();

if (!$result){
	var_dump($stmt->errorInfo());
	exit;
}

header('Location:../members.html');

?>
