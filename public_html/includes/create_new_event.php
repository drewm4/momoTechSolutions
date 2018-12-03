<?php
if(isset($_POST['PublishEvent'])){
    
    require '../src/mysql.php';
    
    $evename = $_POST['eventname'];
    $evetype = $_POST['eventtype'];
    $evedate = $_POST['eventdate'];
    $eveinfo = $_POST['eventinfo'];
    $evexpiry = $_POST['expiredate'];
    
    //check if any fields are left empty
    if(empty($evename) || empty($evetype) || empty($evedate) || empty($eveinfo) || empty($evexpiry)) {
        header("Location: ../pages/adminCreateNew.html?error=emptyfields");
        exit();
    }else{
                //insert user input into databse as a new record
                $sql = "INSERT INTO event(event_name, event_type, event_date, event_info, event_expdate) VALUES 
                                                            ('$evename', '$evetype', '$evedate', '$eveinfo', '$evexpiry')";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/adminCreateNew.html?error=sqlerror");
                    exit();
                }else {

                    mysqli_stmt_bind_param($stmt, "sssss", $evename, $evetype, $evedate, $eveinfo, $evexpiry);
                    mysqli_stmt_execute($stmt);
                    header("Location: ../pages/adminCreateNew.html?eventcreation=success");
                    exit();}
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
                    
    }else if (isset($_POST['SaveEvent'])){

        //save to saved events table

    }else{
    header("Location: ../pages/adminCreateNew.html?error=noclick");
    exit();}