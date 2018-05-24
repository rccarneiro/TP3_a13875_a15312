<?php
require_once 'db.php';

if($_POST){

    session_start();
    $email = $_POST['Email'];
    $password = $_POST['Password'];

    $sql = 'SELECT * FROM Users WHERE Email = "'.$email.'" AND Password = "'.$password.'"';
    $result = $PDO->query($sql);
    $row = $result->fetch();

    if($row){
        $_SESSION['Email'] = $email;
        $_SESSION['Password'] = $password;
        $_SESSION['Nome'] = $row['Nome'];
        header('location:./php/web.php');
    }else{
        unset ($_SESSION['Email']);
        unset ($_SESSION['Password']);
        header('location:./php/members.php');
    }
}else{
    unset ($_SESSION['Email']);
    unset ($_SESSION['Password']);
}







?>
