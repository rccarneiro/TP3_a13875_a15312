<?php
require_once 'db.php';

if($_POST){

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
<<<<<<< HEAD
=======
    
>>>>>>> cd70f514a52c88695ad287a5279753a8cbab4300
    $sql = 'SELECT * FROM Users WHERE email = "'.$email.'" AND password = "'.$password.'"';
    $result = $PDO->query($sql);
    $row = $result->fetch();

    if($row){
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
<<<<<<< HEAD
        $_SESSION['nome'] = $row['Nome'];
=======
        $_SESSION['nome'] = $row['nome'];
>>>>>>> cd70f514a52c88695ad287a5279753a8cbab4300
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
