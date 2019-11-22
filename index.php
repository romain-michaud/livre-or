<?php



?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Accueil </title>
</head>

<body>

<header>

	<img src="logoom.jpg" class="logoom" height="120px" width="400px" ><img>
	
	<div class="dropdown-menu">
	
	<input type="checkbox" id="checkbx"></input>
	<label for="checkbx"></label>
	
	<div class="navigation">
		<ul>
			<li>
				<a href="index.php"> Acceuil </a>
			</li>
			<li>
				<a href="inscription.php"> Inscription </a>
			</li>
			<li>
				<a href="connexion.php"> Connexion </a>
			</li>
			<li>
				<a href="livre-or.php"> <string style="color:gold;">Livre d'or</string> </a>
			</li>
			<li>
				<a href="profil.php"> Profil </a>
            </li>
			<li>
				<a href="commentaire.php"> Commentaire </a>
			</li>
			<li>
				<a href="deconnexion.php"> Déconnexion </a>
            </li>
		</ul>
	</div>
		
	</div>	
	
</header>

<section class="global">

<div id="presentation">

	<div id="pres">

    <h1> Bienvenue sur le livre d'or officiel de l'équipe de l'Olympique de Marseille ! </h1>
    <p> Ici vous allez pouvoir commenter et débattre sur les performances et l'actualité de votre club préféré en vous connectant à votre compte ! </p>
	<a href="connexion.php"> <input type="submit" id="boutonpro" value="Se connecter"></a>
	
	</div>

</div>

</section>

</body>

</html>