
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<div class="col-8 text-center">
<br><h1>Vue globale</h1><br>
</div>
<div class="col-8">
<br><h4>Liste des étudiants</h4><br>
<?php
include "controller.php";
listeEtudiants($idcon);
?>
<div class="text-center">
<form action="controller.php?func=redirection" method="post"><!-- permet d'appliquer la fonction redirection du fichier controller.php quand le formulaire a été rempli -->
    <div class="btn-group">
    <input type='submit' name='modifier' class="btn btn-primary" value='Modifier un etudiant'/><br>
    </div>
        <div class="btn-group">
    <input type='submit' name='supprimer' class="btn btn-primary" value='Supprimer un etudiant'/><br>
        </div>
            <div class="btn-group">
    <input type='submit' name='ajouter'  class="btn btn-primary" value='Ajouter un etudiant'/><br>
    </div>
</form><br>
</div>
<?php
moyenneNotes($idcon);
?>
<form action="controller.php?func=redirection" method="post">
    <br><input type='submit' name='deconnexion' class="btn btn-secondary" value='Deconnexion'/><br>
</form>
</div>
</body>
</html>
