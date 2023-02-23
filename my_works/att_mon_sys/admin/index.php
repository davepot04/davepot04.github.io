<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
	<div class="login-box" style="padding: 20px; margin:150px auto;border-radius: 25px;background-color: white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
		<br>
		<div class="login-logo">
			<h2><b>Attendance Monitoring System</b></h2>
			<h3>Admin Login</h3>
		</div>

		<div class="login-box-body">
			<p class="login-box-msg">Enter your credentials</p>

			<form action="login.php" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
					<span class="glyphicon form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8"></div>
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary" name="login"><i class="fa fa-sign-in"></i> Login</button>
					</div>
				</div>
			</form>
			<div class="text-center">
				<br>
				<a href="../index.php">To Attendance Page</a>
			</div> 
			<?php
			if (isset($_SESSION['error'])) {
				echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
				unset($_SESSION['error']);
			}
			?>
		</div>
	</div>

	<?php include 'includes/scripts.php' ?>
</body>

</html>