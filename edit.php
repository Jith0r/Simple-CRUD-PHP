<?php

require_once('./connexion.php');

// Récupérer les données du client actuel qu'on veut modifié

// Récupère l'identifiant de notre client via le lien edit.php?id= passer au formulaire
$client_id = $_GET['id'];

// Requête pour récupérer le client actuel
$sql = 'SELECT * FROM clients WHERE client_id = :client_id';

// Prépare la requête
$stmt = $pdo->prepare($sql);

//Bind le paramètre
$stmt->bindParam(':client_id', $client_id);

//Execute la requête
$stmt->execute();

// Afficher le client actuel
$clients = $stmt->fetch();


// Une fois que le formulaire est soumis pour la modification
// Vérifier si elle est bien en méthode POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Récupere les données du formulaire
    $client_id = $_POST['client_id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    // Requête pour modifier le client
    $sql_update = 'UPDATE clients SET client_nom = :nom, client_prenom = :prenom, client_email = :email WHERE client_id = :client_id';

    //Prépare la requête
    $stmt = $pdo->prepare($sql_update);

    // Assignie les valeur via bindParam
    $stmt->bindParam(':client_id', $client_id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);

   // Vérification si la requête est bien éxécuter
   // Rediriger vers index.php si tout est ok
   if ($stmt->execute()) {
    header('Location: index.php');
    exit();
    } else {
    echo "Erreur lors de la modification du client.";
    }

}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modification d'un client</title>
</head>
<body>

<div class="container">
    <h2 class="title">MODIFIER UN CLIENT</h2>

 <form method='POST'>

    <input type="hidden" name="client_id" value="<?= $clients['client_id'] ?>">

    <label for="nom">NOM</label>
    <input type="text" name="nom" value="<?= $clients['client_nom']?>"> <br><br>

    <label for="prenom">PRENOM</label>
    <input type="text" name="prenom" value="<?= $clients['client_prenom']?>"> <br><br>

    <label for="email">EMAIL</label>
    <input type="email" name="email" value="<?= $clients['client_email']?>"> <br><br>

    <input type="submit" value="Sauvegarder la modifciation">

 </form>
    
</body>
</html>
