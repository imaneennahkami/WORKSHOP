<?php 
require 'config.php'; 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $sql = "INSERT INTO vehicule (matricule, modele, puissance_fiscale, 
kilometrage, dateAchat) 
            VALUES (?, ?, ?, ?, ?)"; 
 
    $stmt = $pdo->prepare($sql); 
    $stmt->execute([ 
        $_POST['matricule'], 
        $_POST['modele'], 
        $_POST['pf'], 
        $_POST['km'], 
        $_POST['dateAchat'] 
    ]); 
 
    header("Location: index.php"); 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Ajouter véhicule</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head> 
<body class="container mt-5"> 
 
<h2>Ajouter véhicule</h2> 
 
<form method="POST"> 
    <input type="text" name="matricule" placeholder="Matricule" 
class="form-control mb-2" required> 
    <input type="text" name="modele" placeholder="Modèle" class="form
control mb-2" required> 
    <input type="number" name="pf" placeholder="Puissance fiscale" 
class="form-control mb-2"> 
    <input type="number" name="km" placeholder="Kilométrage" class="form
control mb-2"> 
    <input type="date" name="dateAchat" class="form-control mb-2"> 
 
    <button class="btn btn-success">Ajouter</button> 
</form> 
 
</body> 
</html>0$