<?php
require_once "controllers/authController.php";
if (isset($_SESSION['uye_id'])) {
	header('location: index.php');
	exit();
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Online Not Defteri</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="styles.css">

	<style>
		@import url('https://fonts.googleapis.com/css?family=Numans');

		html,
		body {
			background-image: url(assets/wallpaper.jpg);
			background-size: cover;
			background-repeat: no-repeat;
			height: 100%;
			font-family: 'Numans', sans-serif;
		}

		.container {
			height: 100%;
			align-content: center;
		}

		.card {
			height: fit-content;
			margin-top: auto;
			margin-bottom: auto;
			width: 400px;
			background-color: rgba(0, 0, 0, 0.5) !important;
		}

		.social_icon span {
			font-size: 60px;
			margin-left: 10px;
			color: #FFC312;
		}

		.social_icon span:hover {
			color: white;
			cursor: pointer;
		}

		.card-header h3 {
			color: white;
		}

		.social_icon {
			position: absolute;
			right: 20px;
			top: -45px;
		}

		.input-group-prepend span {
			width: 50px;
			background-color: #FFC312;
			color: black;
			border: 0 !important;
		}

		input:focus {
			outline: 0 0 0 0 !important;
			box-shadow: 0 0 0 0 !important;

		}

		.remember {
			color: white;
		}

		.remember input {
			width: 20px;
			height: 20px;
			margin-left: 15px;
			margin-right: 5px;
		}

		.giris_btn {
			color: black;
			background-color: #FFC312;
			width: 100px;
		}

		.giris_btn:hover {
			color: black;
			background-color: white;
		}

		.links {
			color: white;
		}

		.links a {
			margin-left: 4px;
		}
	</style>

</head>

<body>
	<div class="container">
		<div class="d-flex justify-content-center h-100">
			<div class="card">
				<div class="card-header ">
					<h3>Giri?? yap</h3>

				</div>
				<div class="card-body">
					<form action="giris.php" method="POST">
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary text-white"><i class="fas fa-user-cog"></i></span>
							</div>
							<input type="text" class="form-control" name="mail" placeholder="E-mail" required>

						</div>
						<div class="input-group form-group">
							<div class="input-group-prepend">
								<span class="input-group-text bg-primary text-white"><i class="fas fa-key"></i></span>
							</div>
							<input type="password" class="form-control" name="sifre" placeholder="??ifre" required>
						</div>
						<?php if (count($errors) > 0) : ?>
							<div class="alert alert-danger">
								<?php foreach ($errors as $error) : ?>
									<li><?php echo $error; ?></li>
								<?php endforeach; ?>
							</div>
						<?php endif; ?>
						<div class="form-group">

							<input type="submit" value="Giri??" name="giris-btn" class="btn float giris_btn bg-primary text-white"><br><br>
							<p style="color: white;">Hesab??n yoksa <a href="kaydol.php">Kaydol</a>.</p>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>