<?php
require_once 'db.php';

if($_POST){

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = 'SELECT * FROM Users WHERE email = "'.$email.'" AND password = "'.$password.'"';
    $result = $PDO->query($sql);
    $row = $result->fetch();

    if($row){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['nome'] = $row['nome'];
        header('location:../user_profile.php');
    }else{
        unset ($_SESSION['email']);
        unset ($_SESSION['password']);
        header('location:../members.html');
    }
}else{
    unset ($_SESSION['email']);
    unset ($_SESSION['password']);
}







?>
