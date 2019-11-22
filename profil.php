<?php
session_start();
$connexion = mysqli_connect("localhost", "root", "", "livreor");

if(isset($_SESSION["id"]))
{

if(isset($_POST["formprofil"]))
{
	if(isset($_POST['login']))
	{
		if($_SESSION['login'] != $_POST['login'])
		{
			$userconnect = $_SESSION["id"];
			$login = htmlspecialchars($_POST['login']);
			$query = "UPDATE utilisateurs SET login='$login' WHERE id='$userconnect'";
			$execquery = mysqli_query($connexion, $query);
			$_SESSION['login'] = $login;
		}
	}

	if(isset($_POST['mdp']))
	{
		if($_SESSION['password'] != $_POST['mdp'])
		{
			$userconnect = $_SESSION["id"];
			$mdp = sha1($_POST['mdp']);
			$query = "UPDATE utilisateurs SET password='$mdp' WHERE id='$userconnect'";
			$execquery = mysqli_query($connexion, $query);
			$_SESSION['mdp'] = $mdp;
		}
	}
}

?>

<html>

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One&display=swap" rel="stylesheet">
    <title> Profil </title>
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

<section id="profil">

    <form method="POST" class="formpro"> 

    <h1> Modifie tes informations personnelles <?php echo $_SESSION["login"]; ?> </h1>

    <label for ="login"> Login : </label>
    <input type="text" value="<?php echo $_SESSION["login"] ?>" placeholder="Login" class="inputpro" name="login"></input>

    <label for ="password"> Mot de passe : </label>
    <input type="password" value="" placeholder="Mot de passe" class="inputpro" name="mdp"></input>

    <input id="validerpro" type="submit" value="Valider" name="formprofil">

    <a href="deconnexion.php"> Déconnexion </a>


    </form>

</section>

</body>

</html>

<?php
}
else
{
    header("Location:connexion.php");
}