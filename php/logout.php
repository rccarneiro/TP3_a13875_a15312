<?
session_start();
unset ($_SESSION['email']);

unset ($_SESSION['nome']);

header('location:../members.html');
?>
