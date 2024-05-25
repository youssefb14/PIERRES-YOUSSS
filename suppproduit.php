<?php
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
            unset($tableau_de_lignes[$i]);
            break;
        }
        //finsi
    }
    // transformation du tableau de lignes (mis à jour) en texte
    $new_modif = implode("\n", $tableau_de_lignes);
    
    // écriture du nouveau contenu à la place de l'ancien
    file_put_contents("BDD.txt", $new_modif);
    
    // Message information
    echo '<script>alert("Produit Suprimer!");</script>';

    // Redirection vers la page de produits
    echo' 
    <SCRIPT LANGUAGE="JavaScript">
    document.location.href="http://localhost/BOUDOUNT_Youssef_mini-projet/index.php?page=produits"
    </SCRIPT>'
    ;

?>