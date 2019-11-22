<?php

session_start();

$connexion = mysqli_connect("localhost", "root", "", "livreor");

if(isset($_POST["formconnexion"]))
{
    $login = htmlspecialchars($_POST["login"]);
    $mdp = sha1($_POST["mdp"]);

    if(!empty($login) && !empty($mdp))
    {
        $query = "SELECT * FROM utilisateurs WHERE login='$login' AND password='$mdp'";
        $execquery = mysqli_query($connexion, $query);
        $rows = mysqli_num_rows($execquery);
        if($rows!=0)
        {
            $userinfo = mysqli_fetch_all($execquery);
            $_SESSION["id"] = $userinfo[0][0];
            $_SESSION["login"] = $userinfo[0][1];
            $_SESSION["password"] = $userinfo[0][2];
            header('Location: livre-or.php');
        }
        else
        {
            $erreur = "Login ou mot de passe incorrect.";
        }
    }
    else
    {
    $erreur = "Tous les champs doivent être complétés.";
    }
}

?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Connexion </title>
</head>

<body id="bodyco">

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

<main id="mainco">

<form method="POST" class="formco">

    <h1> Connexion </h1>

    <label for ="login"> Login : </label>
    <input type="text" value="" placeholder="Login" class="inputco" name="login"></input>

    <label for ="password"> Mot de passe : </label>
    <input type="password" value="" placeholder="Mot de passe" class="inputco" name="mdp"></input>

    <input  id="zbeub" type="submit" value="Je me connecte" name="formconnexion">

    <a href="inscription.php"> Pas encore de compte ? Inscris toi ! </a>

    <?php if(isset($erreur)) 
    {
        echo "<b>"."<p style='color:red; font-size:16px; padding-bottom:10%; text-align:center;'>".$erreur."</p>"."</b>";
    }
?>

</form>

</main>

</body>

</html>