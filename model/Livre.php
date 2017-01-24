<?php
class Livre 
{   
    /* DECLARATION */
	
    private $_id;
    private $_titre;
    private $_auteur;
    private $_disponible;
    
    function __construct() 
    {
        
    }
    
    /* GETTERS */
    
    function getId() 
    {
        return $this->_id;
    }

    function getTitre() 
    {
        return $this->_titre;
    }

    function getAuteur() 
    {
        return $this->_auteur;
    }

    function getDisponible() 
    {
        return $this->_disponible;
    }
    
    /* SETTERS */

    function setId($id) 
    {
        $this->_id = $id;
    }

    function setTitre($titre) 
    {
        $this->_titre = $titre;
    }

    function setAuteur($auteur) 
    {
        $this->_auteur = $auteur;
    }

    function setDisponible($disponible) 
    {
        $this->_disponible = $disponible;
    }
    
    /*-----------*/
    
    function getAll($bdd)
    {
        $req = $bdd->query("SELECT * FROM livre;") or die(print_r($bdd->errorInfo()));
        $tableLivres = $req->fetchAll();
        return $tableLivres;
    }
}
