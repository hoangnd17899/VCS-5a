<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: /StudentManagement/public/views/Login.php");
    exit;
}
?>
    
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo '<h1>HI asdasdasda</h1>';
        ?>
    </body>
</html>
