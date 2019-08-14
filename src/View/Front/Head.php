<?php

if(isset($_SESSION["cli_id"])){
	$href = '/www/My_account';
	$name_nav_item = 'Mon Compte';
	$deconnexion = '<li class="nav-item">
	<a class="nav-link" href="/www/Deconnexion" id="deconnexion" role="button" >
	Déconnexion
	</a>
	</li>';
}else{
	$href = '/www/Connexion';
	$name_nav_item = 'Connexion';
	$deconnexion = '';
}
?>

<!DOCTYPE HTML>
<!--
Telephasic by HTML5 UP
html5up.net | @ajlkn
Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
<head>

	<title>Kalaweit.org</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="icon" type="image/png" href="/Img/favicon-96.png">
	<link rel="stylesheet" href="/vendor/html5up-telephasic/assets/css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="/vendor/almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="/Css/Front.css">
	<link rel="stylesheet" href="/Css/Animated.css">
</head>
<body class="homepage ">


	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand" <a href="/www/home">WWW.KALAWEIT.ORG</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" style="width:auto">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto nav justify-content-end ">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Présentation
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="/www/Gibbons">Le Gibbon</a>
						<a class="dropdown-item" href="/www/History">Historique</a>
						<a class="dropdown-item" href="/www/Team">L'équipe</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Déforestation
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="/www/Context">Contexte environnemental</a>
						<a class="dropdown-item" href="/www/Deforestation">Déforestation</a>
						<a class="dropdown-item" href="/www/Palm_oil">Huile de Palme</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/www/Borneo" id="Borneo" role="button">
						Bornéo
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/www/Sumatra" id="Sumatra" role="button" >
						Sumatra
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo $href ?>" id="Connexion" role="button" >
						<?php echo $name_nav_item ?>
					</a>
				</li>
				<?php echo $deconnexion ?>
			</ul>

		</div>
	</nav>

	<div id="page-wrapper">

		<!-- Header -->
		<div id="header-wrapper">
			<div id="header" class="container">
			</div>

			<section id="hero" class="container animated fadeIn">
				<p>Plus de 6 000 gibbons seraient détenus illégalement rien que sur les îles de Bornéo, Sumatra et Java. Kalaweit ne pourra pas tous les sauver. Mais par son action sur le terrain, l’association offre une vie meilleure aux gibbons ex-captifs, certains pourront même être relachés.</p>
			</header>
			<br>
			<ul class="actions">
				<li><a href="/www/Friends" class="button">Nous rejoindre</a></li>
			</ul>
		</section>
	</div>
</div>
