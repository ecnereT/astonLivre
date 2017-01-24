<?php
class LivreControler
{
    function __construct() 
    {
        
    }
    function ajouter($bdd, $auteur, $titre, $disponible)
    {
        $req = $bdd->prepare("INSERT INTO livre(auteur, titre, disponible) VALUES (:auteur, :titre, :disponible);") or die(print_r($bdd->errorInfo()));
        $req->execute(array(
         'auteur' => $auteur,
         'titre' => $titre,
         'disponible' => $disponible
         ));
         header("location:http://localhost/astonLivre/index.php");
    }
    function modifier($bdd, $id, $auteur, $titre, $disponible)
    {
        $req = $bdd->prepare("SELECT * FROM livre WHERE id = :id;") or die(print_r($bdd->errorInfo()));
        $req ->execute(array(
         'id' => $id
         ));
        $resultat = $req->fetch();
        if(!$resultat)
        {
            exit('Aucun résultat');
        }
        else
        {
            $req = $bdd->prepare("UPDATE livre SET auteur=:auteur, titre=:titre, disponible=:disponible WHERE id=$id;");
            $req->execute(array(
             'auteur' => $auteur,
             'titre' => $titre,
             'disponible' => $disponible
             ));
             header("location:http://localhost/astonLivre/index.php");
        }
    }
    function supprimer($bdd, $id)
    {
        $req = $bdd->prepare("SELECT * FROM livre WHERE id = :id;") or die(print_r($bdd->errorInfo()));
        $req ->execute(array(
         'id' => $id
         ));
        $resultat = $req->fetch();
        if(!$resultat)
        {
            exit('Aucun résultat');
        }
        else
        {
            $req = $bdd->prepare("DELETE FROM livre WHERE id=$id;");
            $req->execute(array(
             'id' => $id
             ));
             header("location:http://localhost/astonLivre/index.php");
        }
    }
}
