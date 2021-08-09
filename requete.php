<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<html lang="fr">
	<title>requete</title>
</head>
<body>
	<h1>Page de requete</h1>
	<p>retrouvez tout nos jeux disponnible a l'achat, triès par vendeurs et par prix !</p>
	<label for="jeux">votre requete</label>
	<br><br>
	<form id="jeux" method="post" action="reponse.php">
		<label for="nom">Nom du vendeur : </label>
		<input type="text" name="nom" id="nom">
		<label for="prix">prix max : </label>
		<input type="number" name="prix" id="prix">
		<br>
		<label for="ASC">ASC</label>
		<input type="radio" id="ASC" name="tri" value="ASC">
		<label for="DSC">DSC</label>
		<input type="radio" id="DSC" name="tri" value="DSC">
		<br><br><br>
		<input type="submit" name="valider" value="valider">

	</form>
</body>
</html>