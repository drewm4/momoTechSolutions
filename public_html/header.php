<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Yeti Gaming</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	<div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Logo</a>
			</li>
		</ul>
	</div>
	<div class="ml-auto order-0">
		<!--<a class="navbar-brand mx-auto" href="#">Navbar 2</a>-->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
			<span class="navbar-toggler-icon"></span>
		</button>
	</div>
	<div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-link" href="/pages/about.php">About</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="/pages/help.php">Help</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
					Additional Information
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="http://www.yetigaming.com/">Yeti Gaming</a>
					<a class="dropdown-item" href="http://www.poke-regionals.com/">Poke-Regionals</a>
					<a class="dropdown-item" href="http://www.rk9labs.com/">RK9</a>
				</div>
			</li>
			<li class="nav-item">
                <?php
                    if (isset($_SESSION['userId'])){
                            echo '<form action="../includes/logout.php" method="post">
                                    <button type="submit" name="logout-submit" class="btn btn-dark">Logout</button>
                                </form>';
                    }
                    else{
                             echo '<form action="../index.php" method="post">
                                        <button type="submit" name="login-submit" class="btn btn-dark">Login</button>
                                    </form>';
                }
                ?>
				<!--<a class="nav-link" href="pages/login.html">Log In</a>-->
			</li>
		</ul>
	</div>
</nav>

</body>
</html