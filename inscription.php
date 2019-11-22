<?php

$connexion = mysqli_connect("localhost", "root", "", "livreor");

if(isset($_POST["forminscription"]))
{
    $login = htmlspecialchars($_POST["login"]);
    $mdp = sha1($_POST["password"]);
    $mdp2 = sha1($_POST["password2"]);

    if(!empty($_POST["login"]) && !empty($_POST["password"]) && !empty($_POST["password2"]))
    {
        if($mdp == $mdp2)
        {
            $query = "INSERT INTO utilisateurs(login, password) VALUES('$login', '$mdp')";
            mysqli_query($connexion, $query);
            header('Location: connexion.php');
            $erreur = "Votre compte a bien été créé.";
        }
        else
        {
            $erreur="Vos mots de passe ne correspondent pas.";
        }
    }
    else
    {
        $erreur="Tous les champs doivent être complétés.";
    }
}

?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Inscription </title>
</head>

<body id="bodyins">

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

<main id="mainins">

<form method="POST" class="formins">

    <h1> Inscription </h1>

    <label for ="login"> Login : </label>
    <input type="text" value="" placeholder="Login" class="inputins" name="login"></input>

    <label for ="password"> Mot de passe : </label>
    <input type="password" value="" placeholder="Mot de passe" class="inputins" name="password"></input>

    <label for ="password2"> Confirmation mot de passe : </label>
    <input type="password" value="" placeholder="Confirmation mot de passe" class="inputins" name="password2"></input>

    <input  id="zbeub" type="submit" value="Je m'inscris" name="forminscription">

    <a href="connexion.php"> Déjà un compte ? Connecte toi ! </a>

</form>

</main>

</body>

</html>