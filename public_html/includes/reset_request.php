<?php
//if user hits "send me the link button
if (isset($_POST[reset_request_submit])) {

    $selector = bin2hex(random_bytes(8));
    //random_bytes generates bytes to generate a cryptographic token
    //bin2hex converts to hexidermal format for link
    //two functions makes it difficult for a hacker to brute force
    $token = random_bytes(32);
    //actually authenticates the user

    //create the link that we're going to send to the user **will need t update to new url and direct to createNewPassword.php file**

    $url = "momotechsolutions.hostingerapp.com/pages/createNewPassword.php?selector=" . $selector . "&validator=" . bin2hex($token);

    //creates an expiration date for the token

    $expires = date("U") + 3600;

    require '../src/mysql.php';

    $userEmail = $_POST["email"];

    //deletes any existing tokens if the user already tried to reset the pwd recently
    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }
    //database insert
    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";

    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error!";
        exit();
    }
    else{
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = 'Reset your password for Momo Tech';

    $message = '<p>We received a password reset request.  The link to reset your password is below.  If you did not make this request, you can ignore this email</p>';
    $message .= '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';
//may cause an issue but will need to update with new email
    $headers = "From: Momo Tech <admin@momotechsolutions.hostingerapp.com>\r\n";
    $headers .= "Reply-to: admin@momotechsolutions.hostingerapp.com\r\n";
    $headers .= "Content-type: text/html\r\n";

    //need to have a mail function set up to do this
    mail($to, $subject, $message, $headers);

    header("Location: /pages/forgotPassword.php?reset=success");
}
else{
   header("Location:../indexTest.php");
}