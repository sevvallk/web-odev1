<?php
session_start();
// session_destroy();

if (isset($_SESSION["user"]) === TRUE) {
  header("Location: index.php");
} else {
?>
	<!DOCTYPE html>
	<html lang="en" dir="ltr">

	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" href="giris-style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="js/register.js"></script>
		<script src="js/login.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> </head>

	<body>
		<div class="login">
			<h1>Giriş Yap</h1>
			<form action="login.php" method="post">
				<label for="username"> <i class="fas fa-user"></i> </label>
				<input type="text" name="lgnMail" placeholder="E-Posta" id="username" required>

				<label for="password"> <i class="fas fa-lock"></i> </label>
				<input type="password" name="lgnPassword" placeholder="Şifre" id="password" required>

				<input type="submit" value="Giriş Yap">
        <div id="lgnAlert"></div>
      </form>
    </div>
		<hr>
		<div class="register">
			<h1>Kayıt Ol</h1>
			<form action="register.php" method="post" autocomplete="off">
				<label for="name"> <i class="fas fa-user"></i> </label>
				<input type="text" name="name" placeholder="Adınız" id="name" required>

				<label for="surname"> <i class="fas fa-user"></i> </label>
				<input type="text" name="surname" placeholder="Soyadınız" id="surname" required>

        <label for="email"> <i class="fas fa-envelope"></i> </label>
				<input type="email" name="e-mail" placeholder="Email" id="email" required>

        <label for="password"> <i class="fas fa-lock"></i> </label>
				<input type="password" name="password" placeholder="Şifreniz" id="password" required>

        <label for="tel"> <i class="fas fa-mobile"></i> </label>
				<input type="text" name="tel" placeholder="Telefon Numaranız" id="tel" required>

				<input type="submit" value="Kayıt Ol">
        <div id="alert"></div>
        <div id="success"></div>
      </form>
    </div>
	</body>

	</html>
	<?php
}
?>