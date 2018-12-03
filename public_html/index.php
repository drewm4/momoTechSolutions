<?php
require "header.php"
?>

    <main>
        <div class="container-fluid text-center">
            <div class="row content">
                <div class="col-sm-2 sidenav">

                </div>
                <div class="col-sm-8 text-center">
                    <?php
                    if (isset($_SESSION['userId'])){
                        echo '<p class="login-status">You are logged in!</p>';
                    }
                    else {
                        echo '<p class="login-status">You are logged out!</p>';
                    }
                    ?>
                    <h1>YETI Gaming</h1>
                    <button type="button" class="btn btn-outline-dark"><a href="/pages/login.php">Log In</a></button>
                    <button type="button" class="btn btn-outline-dark"><a href="/pages/signup.php">Sign Up</a></button>
                    <p></p>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-outline-dark"><a href="/pages/adminLogin.php">Admin Log In</a></button>
                    </div>
                    <p></p>
                    <hr>
                    <h3></h3>
                    <p></p>
                </div>
                <div class="col-sm-2 sidenav">

                </div>
            </div>
        </div>
    </main>

<?php
require "footer.php"
?>