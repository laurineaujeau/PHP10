
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<h1>Modification d'un étudiant</h1>
<form action="controller.php?func=modifStudent" method="post">
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
<form action="controller.php?func=modifStudent" method="post">
    User_id:
    <input type='text' name='useridSuppr'/><br>
    <input type='submit' name='supprimer' value='Supprimer'/><br>
</form>
</body>
</html>
