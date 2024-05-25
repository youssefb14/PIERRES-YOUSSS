<?php

    function mettre_a_jour($id, $nom, $prix, $categorie, $image) 
    {
        // récupération du fichier en texte
        $fichier = file_get_contents("BDD.txt");

        // transformation du texte en tableau de lignes
        $tableau_de_lignes = explode("\n", $fichier); 

        // Nombre total de ligne du fichier
        $total = count($tableau_de_lignes);

        //Itération pour modifier la bonne ligne
        for($i = 0; $i < $total; $i++)
        ////Pour chaque ligne :
        {
            $champs_produit = explode("|", $tableau_de_lignes[$i]);
            if( $champs_produit[0] == $_GET["id"] )
            //si c'est le bon produit (celui qu'on est en train de modifier)
            {
                //on remplace les champs par leur nouvelle valeur
                $tableau_de_lignes[$i] = $_POST["nom"] . "|" . $_POST["prix"] . "|" . $_POST["categorie"] . "|" . $_POST["image"];
                break;
            }
            //finsi
        }
        // transformation du tableau de lignes (mis à jour) en texte
        $new_modif = implode("\n", $tableau_de_lignes);
        // écriture du nouveau contenu à la place de l'ancien
        file_put_contents("BDD.txt", $new_modif);
        
        // ON peux mettre ici une information du genre "Produit Modifie!"
        echo '<script>alert("Produit Modifie!");</script>';

        //rediriger vers la page de prduits
        echo' 
        <SCRIPT LANGUAGE="JavaScript">
        document.location.href="http://localhost/BOUDOUNT_Youssef_mini-projet/index.php?page=produits"
        </SCRIPT>'
        ;
    }

    function ajouter($nom, $prix, $categorie, $image) 
    {
        $bdd = fopen("BDD.txt","a+");

        // Ajoute un item
        $nom = "\n".$_POST['nom'] . "|";
        $prix = $_POST['prix'] . "|";
        $categorie = $_POST['categorie']. "|";
        $image = $_POST['image'];
        
        // Écrit le résultat dans le fichie
        fputs($bdd, $nom);
        fputs($bdd, $prix);
        fputs($bdd, $categorie);
        fputs($bdd, $image);

        fclose($bdd);

        /* ON peux mettre ici une information du genre "Produit ajouté!", et ne pas lire la suite du php */
        echo '<script>alert("Produit ajouté!");</script>';

        //rediriger vers la page de prduits
        echo' 
        <SCRIPT LANGUAGE="JavaScript">
        document.location.href="index.php?page=produits"
        </SCRIPT>'
        ;

    }
   
    function recuperer_produit($id) 
    {
        // Nom du fichier à ouvrir
        $fichier = file("BDD.txt");

        // Nombre total de ligne du fichier
        $total = count($fichier);

        /*
            Ainsi on a :
            $produit[0] = $produit[nom]
            $produit[1] = $produit[prix]
            $produit[2] = $produit[categorie]
            $produit[3] = $produit[nom_image]
        */

        $produit = null;
        for($i = 0; $i < $total; $i++) 
        // on cherche ligne par ligne le id dans contenu du fichier
        {
            $produit_brut = $fichier[$i];
            $produit_recoupe = explode("|", $produit_brut);
            if ( $produit_recoupe[0] == $id ) 
            /* la condition pour que ce soit le bon produit */
            {
                $produit = $produit_recoupe;
                break;
            }
        }
        
        if ($produit != null)
        // éviter de traiter un produit null if(on ignore si le produit est null)
        {
            $produit["nom"] = $produit[0];
            $produit["prix"] = $produit[1];
            $produit["categorie"] = $produit[2];
            $produit["nom_image"] = $produit[3];
        }
          
        return $produit;
    }

    /* ************************************************************************************** 
    Modification?
    *************************************************************************************** */
        $est_modification = isset($_GET["id"]);
        if ($est_modification) 
        {
            $produit = recuperer_produit($_GET["id"]);
        }
    /*************************************************************************************** */

    /* ************************************************************************************** 
    La gestion du formulaire.
    *************************************************************************************** */
        $produit_courant = null;
        $produit_pre_existant = null;
        // Si un formulaire est soumis
        if( isset($_POST['nom']) && isset($_POST['prix']) && isset($_POST['categorie']) && isset($_POST['image']) )
        {
            // Si un id est fourni (modification)
            if(isset($_GET["id"]))
            {
                // Remplacer les données du produit correspondant à l'id
                mettre_a_jour($_GET["id"], $_POST["nom"], $_POST["prix"], $_POST["categorie"], $_POST["image"]);
            }
            else // Sinon (création)
            {
                // Essayer de récupérer le produit correspondant au nom du produit créé (recuperer_produit($_POST["nom"])
                $produit_pre_existant = recuperer_produit($_POST["nom"]);
                // Si on trouve pas de produit
                if ($produit_pre_existant == null) 
                {
                    //Ajouter le nouveau produit
                    ajouter($_POST["nom"], $_POST["prix"], $_POST["categorie"], $_POST["image"]);
                }
                //Sinon 
                else 
                {
                    // à voir s'il y a des actions à mener ici, probablement pas.
                }
            }
        }
    /* ************************************************************************************** */

?>  

<script type="text/javascript" src="JS_fonction.js"></script>

<!-- Formulaire pour modifier les produit -->
<form method="POST" action="?page=modifproduit<?php echo ($est_modification ? "&id=".$_GET["id"] : ""); ?>" class="w3-panel w3-border w3-row w3-mobile" id="formulaire" onsubmit="return Soumettre()">

    <div class=" w3-red w3-margin w3-row w3-mobile">
        <p>Tous les champs sont obligatoires.</p>
    </div>

    <div class="w3-container w3-margin w3-row w3-mobile">
        <p title="Le nom du produit">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" <?php echo ($est_modification ? " value=\"".$produit["nom"]."\"" : ""); ?> placeholder="Nom"><br><br>
        </p>
        <p>
            <label for="categorie">Categorie: (rares/ancienes/tendances) </label><br>
            <input type="text" id="categorie" name="categorie" <?php echo ($est_modification ? " value=\"".$produit["categorie"]."\"" : ""); ?> placeholder="Categorie"><br><br>
        </p>

        <p>
            <label for="prix">Prix: (en euros/gr) </label><br>
            <input type="text" id="prix" name="prix" <?php echo ($est_modification ? " value=\"".$produit["prix"]."\"" : ""); ?> placeholder="Prix"><br><br>       
        </p>

        <p>
            <label for="image">Photo: (nom de l'image)</label> <br>
            <input type="text" id="image" name="image" <?php echo ($est_modification ? " value=\"".$produit["nom_image"]."\"" : ""); ?> placeholder="Photo">
            <p>fichier qui devra se trouver dans le répertoire "images/"</p><br><br>
        </p>

        <input type="submit" value="Ajouter" class="w3-button w3-white w3-border w3-round-large">
    </div>
    
</form>

