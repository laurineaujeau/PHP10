
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

<div class="col-7">
<br><h1>Ajout d'un étudiant</h1><br>
</div>
<div class="col-3">
<form action="controller.php?func=newStudent" method="post"> <!-- permet d'appliquer la fonction newStudent du fichier controller.php quand le formulaire a été rempli -->

    <label>User_id:</label>
    <input type='text'  class="form-control" name='userid'/><br>

    <label>Nom:</label>
    <input type='text'  class="form-control" name='nom'/><br>
    <label> Prenom:</label>
    <input type='text' class="form-control" name='prenom'/><br>
    <label> Note:</label>
    <input type='text' class="form-control" name='note'/><br><br>

    <input type='submit' name='ajouter' class="btn btn-primary" value='Ajouter'/><br>

</form>
</div>
</div>
</body>
</html>

