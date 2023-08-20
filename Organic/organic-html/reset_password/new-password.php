<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reset Password</title>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">


</head>

<body style="background-color: #e4fdd1;">
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">Reset Password</h4>
					</div>
					<div class="card-body">
						<?php
						$email = $_POST["email"];
						$reset_token = $_POST["reset_token"];
						$new_password = $_POST["new_password"];
						$new_password = password_hash($new_password, PASSWORD_BCRYPT);
						$connection = mysqli_connect("localhost", "root", "", "fruitsvegetables");

						$regexPassword = '/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/';

						$sql = "SELECT * FROM users WHERE user_email = '$email'";
						$result = mysqli_query($connection, $sql);
						if (mysqli_num_rows($result) > 0) {
							$user = mysqli_fetch_object($result);
							if ($user->reset_token == $reset_token) {
								$sql = "UPDATE users SET reset_token='', user_password='$new_password' WHERE user_email='$email'";
								mysqli_query($connection, $sql);

								echo '<p class="text-success">Password has been changed successfully.</p>';
								echo '<a href="../signup-login.php" class="btn custom_btn" >Back to Login</a>';
							} else {
								echo '<p class="text-danger">Recovery email has expired.</p>';
								echo '<a href="../signup-login.php" class="btn custom_btn">Back to Login</a>';
							}
						} else {
							echo '<p class="text-danger">Email does not exist.</p>';
							echo '<a href="../signup-login.php" class="btn custom_btn">Back to Login</a>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>