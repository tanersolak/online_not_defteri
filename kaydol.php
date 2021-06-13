
<?php
 require_once "controllers/authController.php";

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
					<h3>Kaydol</h3>

				</div>
				<div class="card-body">
                <form method="POST" action="giris.php" autocomplete="off">
                                <input type="text" class="form-control" value="<?php echo $FName ?>" name="fname" placeholder="Ad" required><br>
                                <input type="text" class="form-control" value="<?php echo $LName ?>" name="lname" placeholder="Soyad" required><br>
                                <input type="email" class="form-control" value="<?php echo $Email ?>" name="mail" placeholder="Email" required><br>
                                <input type="password" class="form-control"  name="password" placeholder="Şifre" required><br>
                                <?php if (count($errors) > 0) : ?>
                                    <div class="alert alert-danger">
                                        <?php foreach ($errors as $error) : ?>
                                            <li><?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if (count($success) > 0) : ?>
                                    <div class="alert alert-success">
                                        <?php foreach ($success as $message) : ?>
                                            <li><?php echo $message; ?></li>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <input type="submit" value="Kaydol" name="kaydol-btn" class="btn mx-auto mt-3 bg-primary text-white"><br><br>
								<p style="color: white;">Hesabın varsa <a href="giris.php">Giriş yap</a>.</p>
                            </form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<!-- <form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> -->