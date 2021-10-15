<?php

include '../class/user.php';

if(isset($_POST["submit"])){
    // Input
    $username = $_POST["username"];
    $password = $_POST["password"];

    $user = new User();
    $user->login($username,$password);

}

?>