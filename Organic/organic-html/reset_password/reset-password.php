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
						$email = $_GET["user_email"];
						$reset_token = $_GET["reset_token"];

						$connection = mysqli_connect("localhost", "root", "", "fruitsvegetables");

						$sql = "SELECT * FROM users WHERE user_email = '$email'";
						$result = mysqli_query($connection, $sql);
						if (mysqli_num_rows($result) > 0) {
							$user = mysqli_fetch_object($result);
							if ($user->reset_token == $reset_token) {
						?>
								<form method="POST" action="new-password.php">
									<input type="hidden" name="email" value="<?php echo $email; ?>">
									<input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">

									<div class="mb-3">
										<label for="new_password" class="form-label">Enter New Password</label>
										<input type="password" name="new_password" class="form-control" id="new_password" placeholder="Enter new password" required>
									</div>
									<div class="d-grid">
										<button type="submit" class="btn custom_btn">Change Password</button>
									</div>
								</form>
						<?php
							} else {
								echo '<p class="text-danger">Recovery email has expired.</p>';
							}
						} else {
							echo '<p class="text-danger">Email does not exist.</p>';
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>