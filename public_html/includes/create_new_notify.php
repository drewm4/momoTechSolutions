<?php
if(isset($_POST['newnotify'])){
    
    require '../src/mysql.php';
    
    $notname = $_POST['notifyname'];
    $notdate = $_POST['notifydate'];
    $notexpiry = $_POST['expirydate'];
    //nottype = $_POST['notifytype'];
    $notevent = $_POST['notifyevent'];
    //placeholder for doc uploads
    $notinfo = $_POST['notifyinfo'];
    
    //check if any fields are left empty
    if(empty($notname) || empty($notdate) || empty($notexpiry) || empty($notevent) || empty($notinfo)) {
        header("Location: ../pages/adminCreateNotify.php?error=emptyfields");
        exit();
    }else{
                //get event ID assoc with event name and store in $notevent variable
                //note the event ID is stored as a string/text and not a number
                $sql = "SELECT event_id FROM event WHERE event_name = '$notevent'";
                if ($result = mysqli_query($conn,$sql)){
                    
                    while($row = mysqli_fetch_assoc($result)){
                        $notevent = $row['event_id'];
                    }
                }

                //insert user input into databse as a new record
                $sql = "INSERT INTO notify(notify_name, event_id, notify_body, notify_expdate, notify_date) VALUES 
                                                            ('$notname', '$notevent', '$notinfo', '$notexpiry', '$notdate')";
                $stmt = mysqli_stmt_init($conn);
                
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../pages/adminCreateNotify.php?error=sqlerror");
                    exit();
                }else {
                    
                    //post new record to table notify
                    mysqli_stmt_bind_param($stmt, "sssss", $notname, $notevent, $notinfo, $notexpiry, $notdate);
                    mysqli_stmt_execute($stmt);
                    
                    //pull records from table user and send notification emails
                    $to = array();
                    
                    $sql = "SELECT user_email FROM user";
                    if ($result = mysqli_query($conn,$sql)){
                        
                        //while an email is associated with a user...
                        while($row = mysqli_fetch_array($result)){
                            //...push those values into an array
                            array_push($to, $row['user_email']);

                        }
                        //loop through each value in $to array
                        foreach($to as $value){
                                
                        //echo $value."<br>";
                            
                        //send the email to each value
                        ini_set( 'display_errors', 1 );
                        error_reporting( E_ALL );
                        $from = "admin@momotechsolutions.hostingerapp.com";
                        $subject = "Notification from Yeti Gaming!";
                        $message = $notinfo;
                        $headers = 'From: admin@momotechsolutions.hostingerapp.com'."\r\n";
                        $headers .= 'BCC: '.$value."\r\n";
                        mail(null,$subject,$message,$headers);
                        }
                        
                        header("Location: ../pages/adminCreateNotify.php?notificationsent");
                        exit();
                    }
                    
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
  }
}else{
    header("Location: ../adminCreateNotify.php?error=noclick");
    exit();}