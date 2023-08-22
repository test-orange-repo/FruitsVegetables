<!-- Start sign up -->
<?php

// Start sign up
include('./process_pages/database.php');

session_start();


function checkUserExistence($conn, $uname, $uemail, $uphone)
{
	$result = $conn->query("SELECT user_name, user_email, user_phone FROM users");
	while ($user = $result->fetch_assoc()) {
		if ($user["user_name"] == $uname) {
			$_SESSION["errMsg"] = "Username already exists";
		} else if ($user["user_email"] == $uemail) {
			$_SESSION["errMsg"] = "Email Already Exists";
		} else if ($user["user_phone"] == $uphone) {
			$_SESSION["errMsg"] = "Phone already exists";
		}
	}

	if (isset($_SESSION["errMsg"])) {
		header('Location: ./signup-login.php');
		exit();
	}
}

function initializeAddress($conn, $userID, $userPhone)
{
	// Set address details to NULL initially
	$first_name = NULL;
	$last_name = NULL;
	$address = NULL;
	$city = NULL;
	$postcode = NULL;
	$phone = $userPhone;
	$region = NULL;

	$stmt = $conn->prepare("INSERT INTO addresses (first_name, last_name, address, city, postcode, region, phone, user_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param('ssssisii', $first_name, $last_name, $address, $city, $postcode, $region, $userPhone, $userID);

	$stmt->execute();
	$stmt->close();
}

function initializeCart($conn, $userID)
{
	$defaultTotalPrice = 0;

	$cartCheckStmt = $conn->prepare("SELECT cart_id FROM cart WHERE user_id = ?");
	$cartCheckStmt->bind_param("i", $userID);
	$cartCheckStmt->execute();
	$cartCheckResult = $cartCheckStmt->get_result();

	if ($cartCheckResult->num_rows == 0) {
		$insertCartStmt = $conn->prepare("INSERT INTO cart (user_id, cart_totalprice) VALUES (?, ?)");
		$insertCartStmt->bind_param("id", $userID, $defaultTotalPrice);
		$insertCartStmt->execute();
		$insertCartStmt->close();
	}

	$cartCheckStmt->close();
}

// Add the user to the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	$first_name = $_POST["firstName"];
	$last_name = $_POST["lastName"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$password = $_POST["password"];
	$phone = $_POST["phone"];

	checkUserExistence($conn, $username, $email, $phone);

	// Hash the password
	$hashedPassword = password_hash($password, PASSWORD_BCRYPT);

	$stmt = $conn->prepare("INSERT INTO users (first_name, last_name, user_name, user_email, user_password, user_phone, is_loggedIn, user_img) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
	$isLoggedIn = 0;
	$default_img_path = './assets/images/user-profile/default.jpg';
	$default_img = file_get_contents($default_img_path);
	$stmt->bind_param('ssssssis', $first_name, $last_name, $username, $email, $hashedPassword, $phone, $isLoggedIn, $default_img);

	if ($stmt->execute()) {
		$user_id = $conn->insert_id;
		initializeAddress($conn, $user_id, $phone);
		initializeCart($conn, $user_id);
		header("Location: ./signup-login.php");
		exit();
	} else {
		echo "<p style='color: red;'>Error while inserting data</p>";
	}

	$stmt->close();
	$conn->close();

	// End sign up

}

?>



<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Organic</title>
	<link rel="stylesheet" href="./assets/css/signup-login.css">
	<link rel="shortcut icon" href="assets/images/logo/logo3.png" type="image/x-icon">
</head>

<body>
	<div id="container" class="container <?php
											if (isset($_SESSION["errMsg"])) {
												echo "sign-up";
											} else {
												echo "sign-in";
											}
											//session_destroy();
											unset($_SESSION['user_id']);
											unset($_SESSION["errMsg"]);
											?>">
		<!-- FORM SECTION -->
		<div class="row">
			<!-- SIGN UP -->
			<div class="col align-items-center flex-col sign-up">
				<div class="form-wrapper align-items-center">
					<form action="./signup-login.php" method="POST" id="signupForm">
						<div class="form sign-up">
							<span class="errorCont">
								<?php
								if (isset($_SESSION["errMsg"])) {
									echo "<small style='font-size: 12px' class='signup-signin-error'> " . $_SESSION["errMsg"] . "</small>";
								}
								?>
							</span>
							<div class="input-group">
								<i class='bx bxs-user'></i>
								<input type="text" placeholder="Frist name" name="firstName" id="fname">
							</div>
							<div class="input-group">
								<i class='bx bxs-user'></i>
								<input type="text" placeholder="Last name" name="lastName" id="lname">
							</div>
							<div class="input-group">
								<i class='bx bxs-user'></i>
								<input type="text" placeholder="Username" name="username" id="uname">
							</div>
							<div class="input-group">
								<i class='bx bx-mail-send'></i>
								<input type="email" placeholder="Email" name="email" id="email">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Password" name="password" id="password">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Confirm password" name="confirmPassword" id="confPassword">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="tel" placeholder="Phone" name="phone" id="phone">
							</div>
							<button type="submit" id="signupBtn">
								Sign up
							</button>
							<p>
								<span>
									Already have an account?
								</span>
								<b onclick="toggle()" class="pointer">
									Sign in here
								</b>
							</p>
						</div>
					</form>
				</div>

			</div>
			<!-- END SIGN UP -->
			<!-- SIGN IN -->
			<div class="col align-items-center flex-col sign-in">
				<div class="form-wrapper align-items-center">
					<form action="./process_pages/process_login.php" method="POST">
						<div class="form sign-in">
							<span class="errorCont">
								<?php
								if (isset($_SESSION["loginError"])) {
									echo "<small style='font-size: 12px' class='signup-signin-error'> " . $_SESSION["loginError"] . "</small>";
								}
								?>
							</span>
							<div class="input-group">
								<i class='bx bxs-user'></i>
								<input type="text" placeholder="Email" name="loginEmail">
							</div>
							<div class="input-group">
								<i class='bx bxs-lock-alt'></i>
								<input type="password" placeholder="Password" name="loginPassword">
							</div>
							<input type="hidden" name="from_cart" value="<?php echo $from_cart; ?>">
							<button>
								Sign in
							</button>
							<p>

								<a href="./reset_password/index.php" style="color: black"><b>Forgot password?</b></a>

							</p>
							<p>
								<span>
									Don't have an account?
								</span>
								<b onclick="toggle()" class="pointer">
									Sign up here
								</b>
							</p>
						</div>
					</form>
				</div>
				<div class="form-wrapper">

				</div>
			</div>
			<!-- END SIGN IN -->
		</div>
		<!-- END FORM SECTION -->
		<!-- CONTENT SECTION -->
		<div class="row content-row">
			<!-- SIGN IN CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="text sign-in">
					<h2 id="welcome">
						Welcome
					</h2>

				</div>
				<div class="img sign-in">

				</div>
			</div>
			<!-- END SIGN IN CONTENT -->
			<!-- SIGN UP CONTENT -->
			<div class="col align-items-center flex-col">
				<div class="img sign-up">

				</div>
				<div class="text sign-up">
					<h2>
						Join with us
					</h2>
				</div>
			</div>
			<!-- END SIGN UP CONTENT -->
		</div>
		<!-- END CONTENT SECTION -->
	</div>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="./assets/js/signup-login.js"></script>

</body>

</html>