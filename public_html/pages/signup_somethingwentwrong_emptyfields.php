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
			<!--<h4 style ="color:#ff6347;">Something went wrong!</h4>-->
			<!--<h5 style ="color:#ff6347;">Please make sure the following requirements are met before signing up:</h5>-->
			<!--<h5 style ="color:#ff6347;">Your email is valid.</h5>-->
			<!--<h5 style ="color:#ff6347;">Your phone number has 10 digits and looks like this: 555-555-5555</h5>-->
			<!--<h5 style ="color:#ff6347;">Your password has at least 8 characters, uses at least 1 number, and doesn't contain</h5>-->
			<!--<h5 style ="color:#ff6347;">any special characters except !@#$%</h5>-->
			<!--<h4 style ="color:#ff6347;">Something went wrong!</h4>-->
			<!--<h5 style ="color:#ff6347;">That email is already taken!</h5>-->
			<!--<h5 style ="color:#ff6347;">If you don't know your password, click <a href="forgotPassword.html">here</a> to reset your password.</h5>-->
			<h4 style ="color:#ff6347;">Something went wrong!</h4>
			<h5 style ="color:#ff6347;">Please make sure all fields are complete before siging up!</h5>
			<!--<h4 style ="color:#ff6347;">Something went wrong!</h4>-->
			<!--<h5 style ="color:#ff6347;">Please make sure your email and passwords match before siging up!</h5>-->
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
						<button type="submit" name="signup" class="btn btn-default">Sign Up</button>
					</form>
				</div> <!--- End of Modal Content -->
			</div>
		</div>
		<div class="col-sm-2 sidenav">

		</div>
	</div>
</div>
</main>

<?php
    require "../footer.php"
?>