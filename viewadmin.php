
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>
<h1>Vue globale</h1>
<?php
include "controller.php";
listeEtudiants($idcon);
?>
<form action="view-editetudiant.php" method="post">
    <input type='submit' name='modifier' value='Modifier un etudiant'/><br>
    <input type='submit' name='supprimer' value='Supprimer un etudiant'/><br>
</form>
<form action="view-newetudiant.php" method="post">
    <input type='submit' name='ajouter' value='Ajouter un etudiant'/><br>
</form>
<?php

moyenneNotes($idcon);
?>
<form action="index.php" method="post">
    <input type='submit' name='deconnexion' value='Deconnexion'/><br>
</form>
<?php

redirection($idcon);
?>
</body>
</html>
