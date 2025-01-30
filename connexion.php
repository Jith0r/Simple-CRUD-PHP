<?php

// Variable de configuration
$host = 'localhost';
$dbname = 'entreprise';
$username = 'root';
$password = '';
$options = array(
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Récupère les réstulat sous forme de tableau associatif
);

// Préparation de la connexion
try{
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8", 
        $username, $password, $options
    );
} catch(PDOException $e){
    echo 'Erreur de connexion'.$e->getMessage();
}
