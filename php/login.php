<?php
require_once 'db.php';

if($_POST){

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $sql = "SELECT * FROM Users WHERE email ='$email' AND password='$password'";
    $result = $PDO->query($sql);
    $row = $result->fetch();
    if($row){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $row['Nome'];
        header('location:../user_profile.php');
    }else{
        unset ($_SESSION['email']);
        header('location:../members.html');
    }
}else{
    unset ($_SESSION['email']);
}







?>
