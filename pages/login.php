<?php
$message = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") { // correction du mot REQUEST 
	if (array_key_exists('login', $_POST) && array_key_exists('password', $_POST)) {
		if (!empty($_POST['login']) && !empty($_POST['password'])) {
			$_SESSION['User'] = connectUser($_POST['login'], $_POST['password']); // Correction ici : $_GET['login'] -> $_POST['login']


			if (!is_null($_SESSION['User'])) {
				header("Location:index.php");
				exit(); // Stoppe l'exécution du script après la redirection
			} else {
				$message = "Mauvais login ou mot de passe";
			}
		}
	}
}
?>

<section class="wrapper style1 align-center">
	<div class="inner">
		<div class="index align-left">
			<section>
				<header>
					<h3>Se connecter</h3>
					<a href="index.php" class="button big wide smooth-scroll-middle">Revenir à l'accueil</a><!-- supprimé </li> -->
				</header>
				<div class="content">
					<?php echo (!is_null($message) ? "<p>" . $message . "</p>" : ''); ?>
					<form method="post" action="">
						<!--  -->
						<div class="fields">
							<div class="field half">
								<label for="login">Nom d'utilisateur</label>
								<input type="text" name="login" id="login" value="" />
							</div>
							<div class="field half">
								<label for="password">Mot de passe</label>
								<input type="password" name="password" id="password" value="" />
							</div>
						</div>
						<ul class="actions">
							<li><input type="submit" name="submit" id="submit" value="Se connecter" /></li>
						</ul>
					</form>
				</div>
			</section>
		</div>
	</div>
</section>