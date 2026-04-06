 <?php require_once 'config.php'; ?>

<!DOCTYPE html> 
<html> 
<head> 
    <title>Gestion des véhicules</title> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
</head> 
<body class="container mt-5"> 
 
<h2>Liste des véhicules</h2> 
<a href="ajouter.php" class="btn btn-primary mb-3">Ajouter</a> 
 
<table class="table table-bordered"> 
    <tr> 
        <th>Matricule</th> 
        <th>Modèle</th> 
        <th>PF</th> 
        <th>Kilométrage</th> 
        <th>Date Achat</th> 
        <th>Actions</th> 
    </tr> 
 
<?php 
$stmt = $pdo->query("SELECT * FROM vehicule"); 
 
foreach ($stmt as $v) { 
    echo "<tr> 
        <td>{$v['matricule']}</td> 
        <td>{$v['modele']}</td> 
        <td>{$v['puissance_fiscale']}</td> 
        <td>{$v['kilometrage']}</td> 
        <td>{$v['dateAchat']}</td> 
        <td> 
            <a href='modifier.php?id={$v['id']}' class='btn btn-warning btn-sm'>Modifier</a> 
            <a href='supprimer.php?id={$v['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Supprimer ?\")'>Supprimer</a> 
        </td> 
    </tr>"; 
} 
?> 
 
</table> 
</body> 
</html> 