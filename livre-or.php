<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");

if(isset($_SESSION["id"]))
{
	$getid = intval($_SESSION["id"]);
	$query = "SELECT * FROM utilisateurs WHERE id='$getid'";
	$execquery = mysqli_query($connexion, $query);
	$userinfo = mysqli_fetch_all($execquery);
}

?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/css?family=Lora&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Livre d'or </title>
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

<section id="base">

	<nav id="gauche">

		<img src="icon.png" height="100px" width="100px">

		<p>
			<?php 
			if(isset($_SESSION["id"])) 
			{
				echo '<a href="profil.php" style="text-decoration:none; color:white;">'."Bienvenue ".$userinfo[0][1].'</a>'; 
			} 
			else
			{
				echo "Visiteur";
			}
			?> 
		</p>

		<?php 
			if(isset($_SESSION["id"])) 
			{
				echo '<a href="commentaire.php">'.'<input type="button" value="Laisse un commentaire" id="ecrire">'.'</a>';
			} 
				else
			{	
			}
		?>

		<?php 
			if(isset($_SESSION["id"])) 
			{
				echo '<a href="deconnexion.php">'.'<input type="button" value="Déconnexion" id="deco">'.'</a>';
			} 
				else
			{	
				echo '<a href="connexion.php">'.'<input type="button" value="Connexion" id="co">'.'</a>';
			}
		?>

</nav>

<section id="droite">

<?php

		$requete = "SELECT commentaire, date, login FROM commentaires INNER JOIN utilisateurs WHERE commentaires.id_utilisateur = utilisateurs.id ORDER BY date DESC";
		$execrequete = mysqli_query($connexion, $requete);
		$userinfo = mysqli_fetch_all($execrequete);
		$i = 0;

		foreach($userinfo as $key)
		{
			$commentaire = $userinfo[$i][0];
			$date = $userinfo[$i][1];
			$idutilisateur = $userinfo[$i][2];

			echo '<div id="post">
				<h2>'.'Posté le '.$date.' par '.$idutilisateur.'</h2>
				<p>'.$commentaire.'</p>
			</div>';

			$i++;		
		}

?>

</section>

</section>
