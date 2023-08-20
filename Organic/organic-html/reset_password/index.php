<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Password Reset</title>

	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
	

</head>

<body style="background-color: #e4fdd1;">
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
						<h4 class="text-center">Password Reset</h4>
					</div>
					<div class="card-body">
						<form method="POST" action="send-recovery-mail.php">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" name="email" class="form-control" id="email" required>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn custom_btn">Send Recovery Email</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>


</body>

</html>