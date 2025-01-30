<?php

require_once('./connexion.php');

// Requête pour afficher tous les employés
$sql = 'SELECT client_id, client_nom, client_prenom, client_email FROM clients';

$pdo_requete = $pdo->prepare($sql); // Requête préparer
$pdo_requete->execute(); // Exécuter la requête

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Simple CRUD PHP + MYSQL</title>
</head>
<body>
    <div class="container">
            <h2 class="title">SIMPLE PHP CRUD + MYSQL</h2>
            <a href="add.php">Ajouter un client</a>
            <br><br>
            <table class="table-center">
            <tr>
                <th>ID</th>
                <th>NOM</th>
                <th>PRENOM</th>
                <th>EMAIL</th>
            </tr>
            <?php while($clients = $pdo_requete->fetch()){ ;?>
            <tr>
                <td><?= $clients['client_id'] ?></td>
                <td><?= $clients['client_nom'] ?></td>
                <td><?= $clients['client_prenom'] ?></td>
                <td><?= $clients['client_email'] ?></td>
                <td><a href="edit.php?id=<?= urlencode($clients['client_id']) ;?>">Modifier le client</a></td>
                <td>
                    <form action="delete.php" method='POST'>
                        <input type="hidden" name="client_id" value="<?= $clients['client_id']; ?>">
                        <input type="submit" value="Supprimer le client">
                    </form>

                </td>
        
        
            </tr>
            <?php };?>
            
        </table>
        
    </div>
    

</body>
</html>

<?php $pdo = null; ?>