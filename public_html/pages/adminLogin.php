<?php
    require "../header.php"
?>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>

        <div class="col-sm-8 text-center">
            <h1>Administrator</h1>
            <div class="modal-dialog text-center">
                <!--<div class="col-sm-8 main-selection">-->
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="img/transparent momo.png">
                    </div>
                    <form action="../includes/admin_login_form.php" method="post" class="col-12">
    					<div class="form-group">
    					<!-- username and password are == the admin_email, admin_password,in the DB -->
    						<input type="text" name = "username" class="form-control" placeholder="Enter Email">
    					</div>
    					<div class="form-group">
    						<input type="password" name = "password" class="form-control" placeholder="Enter Password">
    					</div>
   							<button type="submit" name="loginbutton" class="btn btn-default">Log In</button>
    					</form>
                    
                    <!--<form class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Enter Password">
                        </div>
                        <button type="button" class="btn btn-default"><a href="adminAcctPublished.html">Log In</a></button>
                    </form> -->
                    <!-- <div class="col-12 forgot">
                        <a href="forgotPassword.html">Forgot Password?</a>
                    </div> -->
                </div> <!--- End of Modal Content -->
            </div>
        </div>

</body>
</html>