<?
session_start();

if((!isset ($_SESSION['login'])) ){
    header('location:index.php');
}else{
    echo 'Olá '.$_SESSION['nome'].'!';
}
?>
<br><br>
<a href="logout.php">LOGOUT</a>

