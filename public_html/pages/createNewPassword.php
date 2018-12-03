<?php
require "../header.php";
?>

<main>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-center">
            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];

                if (empty($selector) || empty($validator)) {

                    echo "Could not validate your request!";
                }
                else {

                    if(ctype_xdigit($selector) !==false && ctype_xdigit($validator) !==false) {
                        ?>
                        
                        <form action="../includes/reset_password.php" method="post">
                            <div class="form-group">
                                <input type="hidden" name="selector" value="<?php echo "$selector"; ?>">
                                <input type="hidden" name="validator" value="<?php echo "$validator"; ?>">
                                <input type="password" name="password" placeholder="Enter a new password">
                                <input type="password" name="pwd-repeat" placeholder="Repeat new password">
                            </div>
                            <button type="submit" name="reset_password_submit" class="btn btn-outline-dark">Reset Password</button>
                        </form>

                        <?php

                    }
                }
            ?>

        </div>
    </div>
</div>
</main>

    <?php
    require "../footer.php";
    ?>