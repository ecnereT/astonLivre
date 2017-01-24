<?php
include_once ('model/connexion.php');
require ('model/Livre.php');
require ('controler/LivreControler.php');

// AJOUTER
if(isset($_POST['ajouter']))
{
    $livreC = new LivreControler();
    $livreC->ajouter($bdd, $_POST['auteur'], $_POST['titre'], $_POST['disponible']);
}
// SUPPRIMER
if(isset($_GET['a']) && ($_GET['a']) === 's')
{
    if(isset($_GET['id']) && is_numeric($_GET['id']))
    {
        $livreC = new LivreControler();
        $livreC->supprimer($bdd, $_GET['id']);
    }
}

// MODIFEIR
if(isset($_POST["modifier"]))
{
    $idObjet = $_POST["IDAModifier"];
    if(isset($_POST["lID$idObjet"]) && isset($_POST["auteurEdition$idObjet"]) && isset($_POST["titreEdition$idObjet"]) && isset($_POST["disponibleEdition$idObjet"]))
    {
        $livreC = new LivreControler();
        $livreC->modifier($bdd,$_POST["lID$idObjet"], $_POST["auteurEdition$idObjet"], $_POST["titreEdition$idObjet"], $_POST["disponibleEdition$idObjet"]);
    }
}

$livre = new Livre();

$lesLivres = $livre->getAll($bdd);

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Oui</title>
        <link href="./css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all"/>
        <script src="./js/jquery-3.1.1.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <form method="post" action="index.php">		
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Auteur</th>
                                    <th>Titre</th>
                                    <th>Disponible</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach($lesLivres as $livre)
                                {?>
                                    <tr>
                                        <td><span id="ligneAuteur<?php echo $livre['id']; ?>" style="display: block;"><?php echo htmlspecialchars($livre['auteur']); ?></span><span id="inputAuteur<?php echo $livre['id']; ?>" style="display: none;"><input class="inputTextModifier" type="text" name="auteurEdition<?php echo $livre['id']; ?>" value='<?php echo htmlspecialchars($livre["auteur"]); ?>' /></span></td>

                                        <td><span id="ligneTitre<?php echo $livre['id']; ?>" style="display: block;"><?php echo htmlspecialchars($livre['titre']); ?></span><span id="inputTitre<?php echo $livre['id']; ?>" style="display: none;"><input class="inputTextModifier" type="text" name="titreEdition<?php echo $livre['id']; ?>" value='<?php echo htmlspecialchars($livre['titre']); ?>' /></span></td>

                                        <td><span id="ligneDisponible<?php echo $livre['id']; ?>" style="display: block;"><?php echo htmlspecialchars($livre['disponible']); ?></span><span id="inputDisponible<?php echo $livre['id']; ?>" style="display: none;"><input class="inputTextModifier" type="number" min="0" name="disponibleEdition<?php echo $livre['id']; ?>" value='<?php echo htmlspecialchars($livre['disponible']); ?>' /></span></td>

                                        <td><a class="edition" id="<?php echo $livre['id']; ?>" href="#"><img src="./img/edit.png" alt="editer" /></a></td>

                                        <td><a href="index.php?id=<?php echo $livre['id']; ?>&a=s"><img src="./img/corbeille.png" alt="delete" /></a></td>
                                    </tr>
                                    <input type="hidden" name="lID<?php echo $livre['id']; ?>" value="<?php echo $livre['id']; ?>" /></td>
                                <?php
                                }
                                ?>
                            <tr>
                                <td><input class="inputText" type="text" id="auteur" name="auteur" placeholder="auteur.." /></td>
                                <td><input class="inputText" type="text" id="titre" name="titre" placeholder="titre.." /></td>
                                <td><input class="inputText" type="number" min="0" id="disponible" name="disponible" placeholder="0 ou plus.." /></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <input type="hidden" id="IDAModifier" name="IDAModifier" value="0" />
                        <button class="boutonAjouter" type="submit" name="ajouter" disabled>
                            Ajouter
                        </button>
                        <button class="boutonModifier" type="submit" name="modifier" disabled>
                            Modifier
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <script src="./js/script.js"></script>
    </body>
</html>
