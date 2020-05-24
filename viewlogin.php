
<!DOCTYPE html>
<html>
<head>
    <link rel='stylesheet' type='text/css' >
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<div class="col-7">
<br><br><h1>Authentification</h1>
</div>
<div class="col-3">
<form action="controller.php?func=authentification" method="post"><!-- permet d'appliquer la fonction authentification du fichier controller.php quand le formulaire a été rempli -->

    <label>Login:</label>
    <input type='text' class="form-control" name='login'/><br>

    <label>Password:</label>
    <input type='text' class="form-control" name='password'/><br><br>

    <input type='submit' name='authentification' class="btn btn-primary" value='Se connecter'/><br>

</form>
</div>
</body>
</html>
