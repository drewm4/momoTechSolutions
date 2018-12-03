<?php

if (isset($_POST["reset_password_submit"])) {

    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $mypassword = $_POST["password"];
    $passwordRepeat = $_POST["pwd-repeat"];

    if (empty($mypassword) || empty($passwordRepeat)) {

        header("Location: ../pages/forgotPassword.php?newpwd=empty");
        exit();
    }
    else if ($mypassword != $passwordRepeat){

        header("Location: ../pages/forgotPassword.php?newpwd=pwdnotsame");
        exit();
    }

        $currentDate = date("U");

        require '../src/mysql.php';

        $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires >= ?";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result)) {

            echo "You need to re-submit your reset request.";
            exit();
        }

        else{

            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false) {

                echo "You need to re-submit your reset request";
                exit();
            }

            elseif ($tokenCheck === true){

                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM user WHERE user_email=?;";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)) {
                    echo "There was an error!";
                    exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
                if (!$row = mysqli_fetch_assoc($result)){

                    echo "There was an error!";
                    exit();
                }
                else {
                   $sql = "UPDATE user SET user_password=? WHERE user_email=?";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "There was an error!";
                        exit();
                    }
                    else {
                        $newPwdHash = password_hash($mypassword, PASSWORD_DEFAULT);
                        mysqli_stmt_bind_param($stmt, "ss", $newPwdHash, $tokenEmail);
                        mysqli_stmt_execute($stmt);

                        $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
                        $stmt = mysqli_stmt_init($conn);
                        if (!mysqli_stmt_prepare($stmt, $sql)) {
                            echo "There was an error!";
                            exit();
                        }
                        else {
                            mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../pages/login.php?newpwd=passwordupdated");


                        }
                    }

                    }
            }
            }
        }
    }

    }
    else {

        header("Location: ../indexTest.php");
    }