<?
session_start();

if((!isset ($_SESSION['Email'])) ){
    header('location:./php/members.php');
}else{
    echo 'Olá '.$_SESSION['Nome'].'!';
}
?>
<br><br>
<a href="./php/logout.php">LOGOUT</a>
