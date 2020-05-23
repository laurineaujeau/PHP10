<?php
/*include "view-editetudiant.php";
include "view-admin.php";
include "view-newetudiant.php";
include "viewadmin.php";
include "viewlogin.php";
include "viewnewuser.php";
include "index.php";
include "tp10.php";
include "file.php";*/
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

if(isset($_GET['func'])){
    if($_GET['func'] == 'authentification'){
        authentification($idcon);
    }else if($_GET['func'] == "newUser "){
        newUser ($idcon);
    }else if($_GET['func'] == "modifStudent"){
        modifStudent($idcon);
    }else if($_GET['func'] == "redirection"){
        redirection($idcon);
    }
}

function newUser ($idcon){
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['ajouter'])){
        $query = "SELECT * from utilisateur";
        $result = $idcon->query($query);
        $compteur =0;
        foreach($result as $data){
            $compteur = $compteur +1;
        }
        $compteur = $compteur +1;
        $login = $_POST['login'];
        $mdp = $_POST['password'];
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom= $_POST['prenom'];
        $query1="INSERT INTO utilisateur VALUES(?,?,?,?,?,?)";
        $result1 = $idcon->prepare($query1);
        $result1->execute([$compteur,$login,$mdp,$mail,$nom,$prenom]);
        header("Location:index.php");
    }
}
function authentification ($idcon){
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
        $query3 = "DELETE from etudiant WHERE user_id=?";
        $result3 = $idcon->prepare($query3);
        $result3->execute([$_POST['useridSuppr']]);
    }


}
function listeEtudiants($idcon){
    $query = "SELECT * from etudiants";
    $result = $idcon->query($query);
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col"> User ID </th>';
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
    foreach ($result as $data) {
        $moyenne += $data['note'];
    }
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
