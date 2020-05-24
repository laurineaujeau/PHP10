<?php
// connexion à la base de données
function connexpdo($base, $user, $password)
{
    try {
        $dbh = new PDO($base, $user, $password);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
    }
    return $dbh;
}
$base='pgsql:dbname=etudiants;host=127.0.0.1;port=5432';
$user = 'postgres';
$password = 'isen2018';

$idcon = connexpdo($base,$user,$password);

// ce if permet de faire la liaison entre toutes les pages html
//attention a bien noter les fonctions sans mettre d'espace
//si la page est toute blanche et l'url est celui ce controller.php ,
// la page html n'a pas pu acceder a la fonction php ou la redirection vers une autre page est mauvaise
// dans ce cas vérifier ce if, le header et la balise form de la page html

if(isset($_GET['func'])){
    if($_GET['func'] == "authentification"){
        authentification($idcon);
    }else if($_GET['func'] == "newUser"){
        newUser($idcon);
    }else if($_GET['func'] == "modifStudent"){
        modifStudent($idcon);
    }else if($_GET['func'] == "redirection"){
        redirection($idcon);
    }else if($_GET['func'] == "newStudent"){
        newStudent($idcon);
    }
}

function newUser($idcon){
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) ){ // vérifie que toutes les données ont bien été rentrées
        $query = "SELECT * from utilisateur";
        $result = $idcon->query($query); // permet la liaison entre la requete et la base de données et renvoi un tableau des résultats de la requete
        $compteur =0;
        foreach($result as $data){
            if($data["id"] > $compteur){ //
                $compteur = $data["id"];//
            }                           //
        }                               //
        $compteur = $compteur +1;       // permet de ne tomber su un id deja existant
        $login = $_POST['login'];
        $mdp = $_POST['password'];
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom= $_POST['prenom'];
        $query1="INSERT INTO utilisateur VALUES(?,?,?,?,?,?)"; // les ? seront remplacés par les variables mises entre crochet dans le execute
        $result1 = $idcon->prepare($query1);
        $result1->execute([$compteur,$login,$mdp,$mail,$nom,$prenom]);
        header("Location:index.php"); //permet la redirection vers la page index.php
    }
}

//Ensuite le code est quasiment identique

function authentification($idcon){
    if(isset($_POST['login']) && isset($_POST['password'])){
        $query = "SELECT * from utilisateur";
        $result = $idcon->query($query);
        $login = $_POST['login'];
        $mdp = $_POST['password'];
        foreach($result as $data){
           if ($data['login']== $login){
               if ($data['password']== $mdp){
                   header("Location:viewadmin.php");
               }
           }
           else{
               header("Location:viewadmin.php");
           }
        }
    }
}
function newStudent($idcon){
    if(isset($_POST['userid']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['note']) ){
        $query = "SELECT * from etudiants";
        $result = $idcon->query($query);
        $compteur =0;
        foreach($result as $data){
            $compteur = $compteur +1;
        }
        $compteur = $compteur +1;
        $userid = $_POST['userid'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $note = $_POST['note'];
        $query1="INSERT INTO etudiants VALUES(?,?,?,?,?)";
        $result1 = $idcon->prepare($query1);
        $result1->execute([$compteur,$userid,$nom,$prenom,$note]);
        header("Location:viewadmin.php");
    }
}
function modifStudent($idcon){
    if(isset($_POST['userid']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['note']) ){
        $query = "SELECT * from etudiants";
        $result = $idcon->query($query);
        $compteur =0;
        foreach($result as $data){
            $compteur = $compteur +1;
            if($_POST['userid']== $data['user_id']){
                $query1 = "DELETE from etudiants WHERE id=?";
                $result1 = $idcon->prepare($query1);
                $result1->execute([$compteur]);
                $userid = $_POST['userid'];
                $nom = $_POST['nom'];
                $prenom = $_POST['prenom'];
                $note = $_POST['note'];
                $query2="INSERT INTO etudiants VALUES(?,?,?,?,?)";
                $result2 = $idcon->prepare($query2);
                $result2->execute([$compteur,$userid,$nom,$prenom,$note]);
                header("Location:viewadmin.php");
            }
        }
    }

    if(isset($_POST['supprimer'])){
        //echo "isset";
        $query3 = "DELETE from etudiants WHERE user_id=?";
        $result3 = $idcon->prepare($query3);
        $result3->execute([$_POST['useridSuppr']]);
        header("Location:viewadmin.php");
    }


}
function listeEtudiants($idcon){
    $query = "SELECT * from etudiants";
    $result = $idcon->query($query);
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col"> User ID </th>'; // scope="col" permet d'avoir un tableau plus joli avec Boostrap
    echo '<th scope="col"> Nom </th>';
    echo '<th scope="col"> Prénom </th>';
    echo '<th scope="col"> Note </th>';
    echo '</tr>';
    echo '</thead>';
    foreach ($result as $data) {
        echo '<tr>';
        echo '<td>' . $data ['user_id'] . '</td>';
        echo '<td>' . $data ['nom'] . '</td>';
        echo '<td>' . $data ['prenom'] . '</td>';
        echo '<td>' . $data ['note'] . '</td>';
        echo '</tr>';
    }

    echo '</table><br>';

}
function moyenneNotes($idcon){
    $query = "SELECT * from etudiants";
    $result = $idcon->query($query);
    $moyenne =0;
    $compteur =0;
    foreach ($result as $data) {
        $moyenne += $data['note'];
        $compteur = $compteur +1;
    }
    $moyenne = $moyenne/$compteur;
    echo '<strong>Note moyenne des étudiants: </strong>'.$moyenne;
    echo '<br>';
}
function redirection($idcon){
    if(isset($_POST['modifier'])||isset($_POST['supprimer'])){
        header("Location:view-editetudiant.php");
    }
    if(isset($_POST['ajouter'])){
        header("Location:view-newetudiant.php");
    }
    if(isset($_POST['deconnexion'])){
        header("Location:index.php");
    }
}
?>
