<?php
    require "../header.php"
?>

<main>
<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">

        </div>
        <div class="col-sm-8 text-center">
            <h1>Sign Up!</h1>
            <div class="modal-dialog text-center">
                <!--<div class="col-sm-6 main-selection">-->
                <div class="modal-content">
                    <div class="col-12 user-img">
                        <img src="#">
                    </div>
                    <form action="../includes/signup_form.php" method="post" class="col-12">
                        <div class="form-group">
                            <input type="text" name="emailid" class="form-control" placeholder="Enter Email">
                        </div>
                        <div class="form-group">
                            <input type="text" name="emailconfirm" class="form-control" placeholder="Confirm Email">
                        </div>
                         <div class="form-group">
                            <input type="tel" name="phone" class="form-control" placeholder="Enter Phone Number as xxx-xxx-xxxx"> 
                        </div>
                        <div class="form-group">
                            <input type="password" name="newpassword" class="form-control" placeholder="Enter Password">
                        </div>
                        <div class="form-group">
                            <input type="password" name="passwordconfirm" class="form-control" placeholder="Confirm Password">
                        </div>
                                <div class="text-center">
                        <div class="container">
                            <h5>Would you like to receive real time event updates from Yeti Gaming?</h5>
                        
                            <input type="radio" name="emailpref" value="1"> Yes! I'd like to receive email updates!
                            <input type="radio" name="emailpref" value="0"> No Thanks!
                        <br>
                        	<?php
		                        if (isset($_SESSION['emailid'])){
		                            echo '<p class="login-status">You are logged in!</p>';
		                        }
		                        else {
		                            echo '<p class="login-status">You are logged in!</p>'; 
		                        }
		                        ?>
                        <button type="submit" name="signup" class="btn btn-default">Sign Up</button>
                    
                </div> <!--- End of Modal Content -->
                
            </div>
            </form>
        </div>
        <div class="col-sm-2 sidenav">

        </div>
    </div>
</div>
</main>

<?php
    require "../footer.php"
?>