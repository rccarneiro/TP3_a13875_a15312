<?php 
require_once 'db.php';

if($_POST){

    session_start();
    $login = $_POST['login'];
    $password = $_POST['password'];

    $sql = 'SELECT * FROM programadores WHERE username = "'.$login.'" AND password = "'.$password.'"';
    $result = $PDO->query($sql);
    $row = $result->fetch();
  
    if($row){
        $_SESSION['login'] = $login;
        $_SESSION['password'] = $password;
        $_SESSION['nome'] = $row['nome'];
        header('location:web.php');
    }else{
        unset ($_SESSION['login']);
        unset ($_SESSION['password']);
        header('location:index.php');
    }
}else{
    unset ($_SESSION['login']);
    unset ($_SESSION['password']);
}






 
?>