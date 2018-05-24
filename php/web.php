<?
session_start();

if((!isset ($_SESSION['email'])) ){
    header('location:../members.html');
}else{
    echo 'Olá '.$_SESSION['email'].'!';
}
?>
<br><br>
<a href="logout.php">LOGOUT</a>
