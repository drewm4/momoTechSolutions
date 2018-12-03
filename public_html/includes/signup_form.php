<?php
if(isset($_POST['signup'])){
    
    require '../src/mysql.php';
    
    $email = $_POST['emailid'];
    $emailrepeat = $_POST['emailconfirm'];
    $phonenum = $_POST['phone'];
    $password = $_POST['newpassword'];
    $passwordrepeat = $_POST['passwordconfirm'];
    $emailpreference = $_POST['emailpref'];
    
    //check if any fields are left empty
    if(empty($email) || empty($emailrepeat) || empty($phonenum) || empty($password) || empty($passwordrepeat || empty($emailpreference))) {
        header("Location: ../pages/signup_somethingwentwrong_emptyfields.php?error=emptyfields");
        exit();
    //confirm that email is valid
    }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../pages/signup_somethingwentwrong.php?error=invalidemail");
        exit();
    //confirm phone number field has valid number of characters
    }else if(!preg_match('/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/', $phonenum)){
        header("Location: ../pages/signup_somethingwentwrong.php?error=invalidphonenumber");
        exit();
    //confirm email matches
    }else if($email !== $emailrepeat){
        header("Location: ../pages/signup_somethingwentwrong_matching.php?error=emailsdontmatch");
        exit();
    //confirm password meets password requirements
    //must include at least 1 number, at least 1 letter, can contain numbers, letters, or characters
    }else if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/', $password)){
        header("Location:../pages/signup_somethingwentwrong.php?error=passwordfailsrequirements");
        exit();
    //confirm password matches
    }else if($password !== $passwordrepeat){
        header("Location: ../pages/signup_somethingwentwrong_matching.php?error=passwordsdontmatch");
        exit();
    //confirm email isn't already used
    }else{
        
        $sql = "SELECT user_email FROM user WHERE user_email=?";
        $stmt = mysqli_stmt_init($conn);
        
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/signup.php?error=sqlerror");
            exit();
        }else {
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            //stores results from database back into stmt
            mysqli_stmt_store_result($stmt);
            //set a variable equal to # rows returned
            $resultCheck = mysqli_stmt_num_rows($stmt);
            
            if($resultCheck > 0){
                header("Location: ../pages/signup_somethingwentwrong_emailtaken.php?error=emailtaken");
                exit();
            //insert user input into databse as a new record
            }else {
                
                $sql = "INSERT INTO user(user_email,user_password,user_phone,user_emailpref) VALUES (?,?,?,?)";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/signup.php?error=sqlerror");
                    exit();
                }else {
                    
                    //hash the pass
                    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
                    
                    mysqli_stmt_bind_param($stmt, "ssss", $email, $hashedPwd, $phonenum, $emailpreference);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../pages/UserHome.php");
                    exit();
                }
                    
              }
        }
        
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    
}else {
    header("Location: ../pages/signup.php?error=noclick");
    exit();
}