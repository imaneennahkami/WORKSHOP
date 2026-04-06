<?php 
require 'config.php';
$id = $_GET['id']; 
 
$stmt = $pdo->prepare("SELECT * FROM vehicule WHERE id=?"); 
$stmt->execute([$id]); 
$v = $stmt->fetch(); 
 
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $sql = "UPDATE vehicule SET matricule=?, modele=?, puissance_fiscale=?, 
kilometrage=?, dateAchat=? WHERE id=?"; 
    $stmt = $pdo->prepare($sql); 
    $stmt->execute([ 
        $_POST['matricule'], 
        $_POST['modele'], 
        $_POST['pf'], 
        $_POST['km'], 
        $_POST['dateAchat'], 
        $id 
    ]); 
 
    header("Location: index.php"); 
} 
?> 
 
<!DOCTYPE html> 
<html> 
<head> 
    <title>Modifier véhicule</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head> 
<body class="container mt-5"> 
 
<h2>Modifier véhicule</h2> 
 
<form method="POST"> 
    <input type="text" name="matricule" value="<?= $v['matricule'] ?>" 
class="form-control mb-2"> 
    <input type="text" name="modele" value="<?= $v['modele'] ?>" 
class="form-control mb-2"> 
    <input type="number" name="pf" value="<?= $v['puissance_fiscale'] ?>" 
class="form-control mb-2"> 
    <input type="number" name="km" value="<?= $v['kilometrage'] ?>" 
class="form-control mb-2"> 
    <input type="date" name="dateAchat" value="<?= $v['dateAchat'] ?>" 
class="form-control mb-2"> 
 
    <button class="btn btn-primary">Modifier</button> 
</form> 
 
</body> 
</html>