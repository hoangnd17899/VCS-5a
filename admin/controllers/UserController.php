<?php

require_once '../../admin/config/config.php';
require_once '../../admin/dbconnect/dbconnection.php';

class UserController
{
    private $link;

    function __construct()
    {
        $this->link = InitConnect();
    }

    function CheckLogin(User $user)
    {
        $sql = "SELECT * FROM Users WHERE UserName = ?";

        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $user->getUserName();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                // Store result
                mysqli_stmt_store_result($stmt);

                // Check if username exists, if yes then verify password
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $password, $fullname, $phonenumber, $email);
                    if (mysqli_stmt_fetch($stmt)) {
                        //                        if (password_verify($password, $hashed_password)) {
                        //                            return constant("LOGIN_SUCCESS_CODE");
                        //                        } else {
                        //                            return constant("LOGIN_FAILED_NOTFOUND_CODE");
                        //                        }
                        if ($user->getPassword() === $password) {
                            return constant("LOGIN_SUCCESS_CODE");
                        }
                        return constant("LOGIN_FAILED_NOTFOUND_CODE");
                    }
                } else {
                    return constant("LOGIN_FAILED_NOTFOUND_CODE");
                }
            } else {
                return constant("SERVER_ERROR");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    function Register(User $user)
    {
        $sql = "SELECT * FROM Users WHERE UserName = ?";

        if ($stmt = mysqli_prepare($this->link, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = $user->getUserName();

            // Attempt to execute the prepared statement
            if (mysqli_stmt_execute($stmt)) {
                
            } else {
                return constant("SERVER_ERROR");
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
}
