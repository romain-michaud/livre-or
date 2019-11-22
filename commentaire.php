<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");

if(isset($_SESSION["id"]))
{
	$getid = intval($_SESSION["id"]);
	$query = "SELECT * FROM utilisateurs WHERE id='$getid'";
	$execquery = mysqli_query($connexion, $query);
	$userinfo = mysqli_fetch_all($execquery);

    if(isset($_POST["formcommentaire"]))
    {
        if(!empty($_POST["commentaire"]))
        {
            $commentaire = htmlspecialchars($_POST["commentaire"]);
            $iduser = $_SESSION["id"];
            $query = "INSERT INTO commentaires(commentaire, id_utilisateur, date) VALUES ('$commentaire', '$iduser', NOW())";
            $execquery = mysqli_query($connexion, $query);
            $erreur = "Votre commentaire a bien été posté.";
        }
        else 
        {
            $erreur = "Le champs commentaire est vide.";
        }
    }
?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Commentaire </title>
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

<main id="maincom">

<form method="POST" class="formcom">

    <h1> Commentaire </h1>

    <label for ="login"> Mon commentaire : </label>
    <textarea value="" placeholder="Mon commentaire" class="inputcom" name="commentaire"></textarea>

    <input id="zbeub" type="submit" value="Valider" name="formcommentaire">

    <a href="livre-or.php"> Retourner au livre d'or </a>

    <?php if(isset($erreur)) 
    {
        echo "<b>"."<p style='color:red; font-size:16px; padding-bottom:10%; text-align:center;'>".$erreur."</p>"."</b>";
    }
?>

</form>

</main>

</body>

</html>

<?php

}
else{
    header('Location: connexion.php');
}
?>