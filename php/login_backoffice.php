<?php
require_once 'db.php';

if($_POST){

    session_start();
    $email = $_POST['email'];
    $password = $_POST['password'];
    /*$password = md5($password);*/
    $sql = "SELECT * FROM Administrador WHERE email ='$email' AND password='$password'";
    $result = $PDO->query($sql);
    $row = $result->fetch();

    if($row){
        $_SESSION['email'] = $email;
        header('location:../indexAdmin.php');
    }else{
        unset ($_SESSION['email']);
        header('location:../login_backoffice.html');
    }
}else{
    unset ($_SESSION['email']);
}
?>
