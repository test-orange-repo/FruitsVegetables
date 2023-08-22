<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Password Reset</title>

	<!-- Add Bootstrap CSS link -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">

</head>

<body  style="background-color: #e4fdd1;">
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">Password Reset</h4>
					</div>
					<div class="card-body">
						<?php
						// Import PHPMailer classes into the global namespace
						// These must be at the top of your script, not inside a function
						use PHPMailer\PHPMailer\PHPMailer;
						use PHPMailer\PHPMailer\Exception;

						// Load Composer's autoloader
						require 'vendor/autoload.php';

						$connection = mysqli_connect("localhost", "root", "", "fruitsvegetables");
						$email = $_POST["email"];

						$sql = "SELECT * FROM users WHERE user_email = '$email'";
						$result = mysqli_query($connection, $sql);
						if (mysqli_num_rows($result) > 0) {
							$reset_token = time() . md5($email);

							$sql = "UPDATE users SET reset_token='$reset_token' WHERE user_email='$email'";
							mysqli_query($connection, $sql);



							$message = "<p>Please click the link below to reset your password</p>";
							$message .= "<a href='http://localhost/FruitsVegetables/Organic/organic-html/reset_password/reset-password.php?user_email=$email&reset_token=$reset_token'>";
							$message .= "Reset password";
							$message .= "</a>";

							
							send_mail($email, "Reset password", $message);
						} else {
							echo "Email does not exist";
						}

						function send_mail($to, $subject, $message)
						{
							$mail = new PHPMailer(true);

							try {
								// Server settings
								$mail->SMTPDebug = 0;  // Enable verbose debug output
								$mail->isSMTP();       // Set mailer to use SMTP
								$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
								$mail->SMTPAuth = true;  // Enable SMTP authentication
								$mail->Username = 'leenaalrababah@gmail.com';  // SMTP username
								$mail->Password = 'ezjrcpslawvkafhc';  // SMTP password
								$mail->SMTPSecure = 'tls';  // Enable TLS encryption, `ssl` also accepted
								$mail->Port = 587;  // TCP port to connect to

								$mail->setFrom('leenaalrababah@gmail.com', 'Leena');
								// Recipients
								$mail->addAddress($to);

								// Content
								$mail->isHTML(true);  // Set email format to HTML
								$mail->Subject = $subject;
								$mail->Body = $message;

								$mail->send();
								echo 'Message has been sent';
							} catch (Exception $e) {
								echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
							}
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>