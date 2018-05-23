<?
session_start();
unset ($_SESSION['login']);
unset ($_SESSION['password']);
unset ($_SESSION['nome']);

header('location:index.php');
?>