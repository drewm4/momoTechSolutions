<?php
//check to make sure the user got to this point by hitting the login button
if(isset($_POST['loginbutton'])){
    
    //include connection to doc that connects to DB
    require '../src/mysql.php';
        
    //fetch data from user and store in PHP variable
    $myusername = $_POST['username'];
    $mypassword = $_POST['password'];
    
    
    if(empty($myusername) || empty($mypassword)){
        header("Location: /pages/login.php?error=emptyfields");
        exit();
    }else{
        $sql = "SELECT * FROM user WHERE user_email=?;";
        $stmt = mysqli_stmt_init($conn);
            
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location: ../pages/login.php?error=sqlerror");
            exit();
        }else {
            
            
            mysqli_stmt_bind_param($stmt, "s", $myusername);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            //did we actually get any info from the DB? if so, store in associative array
            if($row = mysqli_fetch_assoc($result)){
                
                $pwdCheck = password_verify($mypassword, $row['user_password']);
                if($pwdCheck == false){
                    header("Location: ../pages/login.php?error=wrongpassword");
                    exit();
                }else if($pwdCheck == true){
                    //session variable allows a variable to be created that is globally visable for use with other pages 
                    //once user is logged in
                    session_start();
                    
                    $_SESSION['userId'] = $row['user_id'];
                    $_SESSION['adminId'] = $row['admin_id'];
                    $_SESSION['userEmail'] = $row['user_email'];
                    
                    header("Location: /pages/UserHome.php?login=success");
                    exit();
                    
                }
                    
            }else {
                header("Location: ../loginform.html?error=nouser");
                exit();
            }
        }
        
    }
} else {
    header("Location: ../loginform.html");
    exit();
}