
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" >
</head>
<body>
<h1>Modification d'un étudiant</h1>
<form action="view-editetudiant.php?func=modifStudent" method="post">
    User_id:
    <input type='text' name='userid'/><br>
    Nom:
    <input type='text' name='nom'/><br>
    Prenom:
    <input type='text' name='prenom'/><br>
    Note:
    <input type='text' name='note'/><br>

    <input type='submit' name='modifier' value='Modifier'/><br>
</form>
<h1>Suppression d'un étudiant</h1>
<form action="view-editetudiant.php?func=modifStudent" method="post">
    User_id:
    <input type='text' name='useridSuppr'/><br>
    <input type='submit' name='supprimer' value='Supprimer'/><br>
</form>
</body>
</html>
