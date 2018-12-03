<?php
if(isset($_POST['addevent'])){
    
    
    require '../src/mysql.php';
    
    
    //update selected events
    
    // $evename = $_POST['eventname'];
    $eveid = $_POST['eventid'];
    // $evedate = $_POST['eventdate'];
    $eveexpiry = $_POST['eventexpire'];
    

                //insert user input into databse as a new record
                $sql = "INSERT INTO user_eventpref(event_id, event_expdate) VALUES 
                                                            ('$eveid', '$eveexpiry')";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/UserHome.php?error=sqlerror");
                    exit();
                }else {
                    
                    //post new record to table user_eventpref
                    mysqli_stmt_bind_param($stmt, "ss", $eveid, $eveexpiry);
                    mysqli_stmt_execute($stmt);
                        
                    header("Location: ../pages/UserHome.php?eventsadded");
                    exit();
                    }
                    
        
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
  }