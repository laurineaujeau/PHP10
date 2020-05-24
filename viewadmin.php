
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<h1>Vue globale</h1>
<?php
include "controller.php";
listeEtudiants($idcon);
?>
<!--<form action="view-editetudiant.php" method="post">-->
<form action="controller.php?func=redirection" method="post">
    <input type='submit' name='modifier' value='Modifier un etudiant'/><br>
    <input type='submit' name='supprimer' value='Supprimer un etudiant'/><br>
</form>
<form action="viewadmin.php?func=redirection" method="post">
    <input type='submit' name='ajouter' value='Ajouter un etudiant'/><br>
</form>
<?php

moyenneNotes($idcon);
?>
<!--<form action="index.php?func=redirection" method="post">-->
<form action="controller.php?func=redirection" method="post">
    <input type='submit' name='deconnexion' value='Deconnexion'/><br>
</form>
<?php

//redirection($idcon);
?>
</body>
</html>
