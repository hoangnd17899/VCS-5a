<!-- PHP -->
<?php
require_once '../../admin/config/config.php';
include '../../admin/controllers/UserController.php';
include '../../admin/models/User.php';
?>
<?php

$username = $password = "";
$username_err = $password_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username is empty
    if (empty(trim($_POST["username"]))) {
        $username_err = "Please enter username.";
    } else {
        $username = trim($_POST["username"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate credentials
    if (empty($username_err) && empty($password_err)) {
        $user = new User();
        $user->setUserName($username);
        $user->setPassword($password);

        $userController = new UserController();
        $rs = $userController->CheckLogin($user);
        echo $rs;
        switch ($rs) {
            // login success
            case constant("LOGIN_SUCCESS_CODE"):
                // Password is correct, so start a new session
                session_start();

                // Store data in session variables
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;

                // Redirect user to welcome page
                header("location: /StudentManagement/public/views/Home.php");
                break;
            //login failed
            case constant("LOGIN_FAILED_NOTFOUND_CODE"):
                $login_error = "Username or password is not exist ...";
                break;
            // server error
            case constant("SERVER_ERROR_CODE"):
                break;
        }
    }
}
?>