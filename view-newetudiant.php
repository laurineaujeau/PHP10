
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>
<h1>Ajout d'un étudiant</h1>
<form action="view-newetudiant.php" method="post">
    User_id:
    <input type='text' name='userid'/><br>
    Nom:
    <input type='text' name='nom'/><br>
    Prenom:
    <input type='text' name='prenom'/><br>
    Note:
    <input type='text' name='note'/><br>

    <input type='submit' name='ajouter' value='Ajouter'/><br>

</form>
<?php
include "controller.php";
newStudent($idcon);
?>
</body>
</html>

