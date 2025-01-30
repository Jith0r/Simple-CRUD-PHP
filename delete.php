<?php

require_once('./connexion.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    // Récupere l'id du client à supprimer
    $client_id = $_POST['client_id'];

    // Requête SQL pour supprimer un client
    $sql = 'DELETE FROM clients WHERE client_id = :client_id';

    // On prépare la requête
    $stmt = $pdo->prepare($sql);

    // On assignie :client_id à $client_id
    $stmt->bindParam(':client_id', $client_id);

    // On éxécute la requête
    $stmt->execute();

    // Redirection vers l'index.php
    header('Location: index.php');
    exit();


}




?>