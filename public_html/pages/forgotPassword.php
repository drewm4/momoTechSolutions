<?php
    require "../header.php"
?>

<main>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-center">
            <h1>MOMO TECH</h1>
            <h3>Forgot Password?</h3>
            <p>To reset your password, provide us with the email address associated with your account.  We'll send you an email with a link where you can reset your password.</p>
                    <form action="../includes/reset_request.php" method="post">
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Enter E-mail">
                        </div>
                        <button type="submit" name="reset_request_submit" class="btn btn-outline-dark">Send me the Link</button>
                                            <?php
                        if (isset($_GET["reset"])) {
                            if ($_GET["reset"] == "success") {
                                echo '<p class="signupsucces">Check your e-mail!</p>';
                            }
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-2 sidenav">

        </div>
    </div>
</div>
</main>