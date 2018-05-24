<?
session_start();
unset ($_SESSION['Email']);
unset ($_SESSION['Password']);
unset ($_SESSION['Nome']);

header('location:./php/members.php');
?>
