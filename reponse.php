<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<html lang="fr">
	<title>requete</title>
</head>
<body>
	<h1>résultats de la requête :</h1>
	<p>Voici les résultats de votre requête :</p>
	<?php
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		}
		catch (Exception $e)
		{	
        	die('Erreur : ' . $e->getMessage());
		}

		isset($_POST['nom']);
		$vendeur=htmlspecialchars($_POST['nom']);

		if(!($_POST['prix']=='')) {
			$prix_max=htmlspecialchars($_POST['prix']);
		}else{
			$prix_max = 999999;
		}

		if(isset($_POST['tri'])){
			$tri = $_POST['tri'];	
		}else{
			$tri= 'ASC';
		}

		if ($tri=='ASC') {
			$req =$bdd -> prepare('SELECT nom,prix FROM jeux_video WHERE possesseur = :vendeur AND prix<= :prix_max ORDER BY prix ');
			$req -> execute(array('vendeur' => $vendeur , 'prix_max' => $prix_max ));
		}else{
			$req =$bdd -> prepare('SELECT nom,prix FROM jeux_video WHERE possesseur = :vendeur AND prix<= :prix_max ORDER BY prix DESC');
			$req -> execute(array('vendeur' => $vendeur , 'prix_max' => $prix_max ));
		}


		while ($donnees = $req -> fetch())
		{
			echo '<ul>';
			echo '<li>' . $donnees['nom'] . ' ('. $donnees['prix'] . 'euros)</li>' . '<br />';
			echo '</ul>';
		}
		$req -> closeCursor(); // Termine le traitement de la requête
	?>
</body>
</html>