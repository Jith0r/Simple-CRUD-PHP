<?php

require_once('./connexion.php');

// Vérifier si le form a bien été soumis via POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    //Récupere les paramètre passer par le formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $sql = 'INSERT INTO clients (client_nom, client_prenom, client_email) VALUES (:nom, :prenom, :email)';

    // On prépapre la requête
    $stmt = $pdo->prepare($sql);

    // On assignie les parmètre à nos variables
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    
    // On éxécute la requête
    $stmt->execute();

    //Redirection une fois que c'est fait
    header('Location: index.php');
    exit();

}

$pdo = null;

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="style.css">
    <title>Ajouter un client</title>
</head>
<body>

   <div class="container">
    <h2 class="title">AJOUTER UN CLIENT</h2>

    <form class="form" method='POST'>

        
        <label for="nom">NOM</label>
        <input type="text" name="nom" id="nom"><br>

        <label for="prenom">PRENOM</label>
        <input type="text" name="prenom" id="prenom"><br>

        <label for="email">EMAIL</label>
        <input type="email" name="email" id="email">

        <input type="submit" value="Ajouter le client">
 


    </form>

    </div>

</body>
</html>
