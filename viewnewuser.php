<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
<h1>Nouveau utilisateur (professeur)</h1>
<form action="controller.php?func=newUser" method="post">
    Login:
    <input type='text' name='login'/><br>
    Password:
    <input type='text' name='password'/><br>
    Mail:
    <input type='text' name='mail'/><br>
    Nom:
    <input type='text' name='nom'/><br>
    Prenom:
    <input type='text' name='prenom'/><br>

    <input type='submit' name='ajouter' value='Ajouter'/><br>

</form>
</body>
</html>

