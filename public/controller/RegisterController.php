<?php

require_once '../../admin/config/config.php';
include '../../admin/controller/UserController.php';
include '../../admin/model/User.php';

session_start();

$username = $password = $fullname = $phonenumber = $email = "";

// function ValidatePhoneNumber($phonenumber)
// {
//     if (preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phonenumber)) {
//         return true;
//     }
//     return false;
// }

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $fullname = trim($_POST["fullname"]);
    $phonenumber = trim($_POST["phonenumber"]);
    $email = trim($_POST["email"]);

    $user = new User();
    $user->setUserName($username);
    $user->setPassword($password);
    $user->setFullName($fullname);
    $user->setPhoneNumber($phonenumber);
    $user->setEmail($email);

    

}
