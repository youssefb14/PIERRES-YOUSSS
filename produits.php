<div class="w3-margin-top w3-margin w3-border-top w3-row w3-section w3-mobile">
    <h1><b>LES PIERRES </b></h1>
</div>

<!-- Sous menu de filtrage -->
<div class="w3-row w3-section w3-mobile w3-border-bottom w3-margin w3-margin-bottom">
    <!-- Filtrer par Categorie -->
    <select id="filtre_c" name="filtre_c" class="w3-white w3-row w3-section w3-mobile w3-margin w3-round-xlarge w3-button w3-border" onChange="filtrer_categorie()">
        <option disabled selected>Trier par categorie</option>
        <option value="ancienes">Ancienes</option>
        <option value="rares">Rares</option>
        <option value="tendances">Tendances</option>
    </select>
    <!-- Filtrer par couleur -->
    <select id="filtre_co" name="filtre_co" class="w3-white w3-row w3-section w3-mobile w3-margin w3-round-xlarge w3-button w3-border" onChange="filtrer_couleur()">
        <option disabled selected>Couleur</option>
        <option value="rose">Rose</option>
        <option value="or">Dorée</option>
        <option value="marron">Marron</option>
        <option value="violet">Violet</option>
        <option value="bleu">Bleu</option>
        <option value="vert">Vert</option>
        <option value="jaune">Jaune</option>
        <option value="gris">Gris</option>
        <option value="noir">Noir</option>
    </select>
    <!-- Filtrer par prix -->
    <select id="filtre_p" name="filtre_p" class="w3-white w3-row w3-section w3-mobile w3-margin w3-round-xlarge w3-button w3-border">
        <option disabled selected>Prix</option>
        <option value="prix_c">Prix croissant</option>
        <option value="prix_d">Prix decroissant</option>
    </select>
    <button class="w3-white w3-row w3-section w3-mobile w3-margin w3-round-xlarge w3-button w3-border" onclick="afficher_toutes()">Toutes les pierres</button>
</div>

<!-- Fonctions pour filtrer -->
<script>
    function filtrer_categorie() 
    {
        // Récupérer l'élement qui est la liste
        var liste = document.getElementById("liste_produits");

        //Désigner l'élément sélectionné dans le select
        var choix = document.getElementById("filtre_c").value;
        
        // Itérer sur les enfants de cette liste [ for( let element of collection) ]
        for (let produit of liste.children)
        {
            // On retourve la catégorie de l'élément
            let categorie_produit = produit.dataset.categorie;
            
            // Pour chaque enfants, si la categorie est celle sélectionnée -> display = "", sinon display = "none"
            if( categorie_produit == choix )
            {
                produit.style.display = ""; 
            }
            else
            {
                produit.style.display = "none";
            }
        }       
    }
    function filtrer_couleur() 
    {
        // Récupérer l'élement qui est la liste
        var liste = document.getElementById("liste_produits");

        //Désigner l'élément sélectionné dans le select
        var choix2 = document.getElementById("filtre_co").value;
        
        // Itérer sur les enfants de cette liste
        for (let produit of liste.children)
        {
            // On retourve la catégorie de l'élément
            let couleur_produit = produit.dataset.couleur;
            console.log(choix2, couleur_produit);
            // Pour chaque enfants, si la categorie est celle sélectionnée -> display = "", sinon display = "none"
            if( couleur_produit == choix2 )
            {
                produit.style.display = ""; 
            }
            else
            {
                produit.style.display = "none";
            }
        }       
    }
    function afficher_toutes()
    {
        // Récupérer l'élement qui est la liste
        var liste = document.getElementById("liste_produits");

        //Désigner l'élément sélectionné dans le select
        var choix = document.getElementById("filtre_c").value;
        
        // Afficher tout les pierre
        for (let produit of liste.children)
        {
            produit.style.display = "";
        } 
    }
</script>

<!-- liste de produits -->
<div id="liste_produits" class="w3-container w3-white w3-row w3-section w3-mobile w3-margin">
    
    <?php
        // Nom du fichier à ouvrir
        $fichier = file("BDD.txt");

        // Nombre total de ligne du fichier
        $total = count($fichier);


        for($i = 0; $i < $total; $i++)
        {
            $bdd = $fichier[$i];
            $produit = explode("|", $bdd);
            /*
            Ainsi on a :
            $produit[0] = $produit[nom]
            $produit[1] = $produit[prix]
            $produit[2] = $produit[categorie]
            $produit[3] = $produit[nom_image]
            $produit[4] = $produit[couleur]
            */
            
            echo "
            <div class='w3-third w3-container w3-white w3-row w3-section w3-mobile' data-categorie='$produit[2]' data-couleur='$produit[4]'>
                <div class='w3-card-4 w3-margin w3-row w3-section w3-mobile' >
                    <img src='medias/pierres/$produit[3].jpg' width='100%'>
                    <div class='w3-container w3-center w3-row w3-section w3-mobile'>
                        <p>La $produit[0]</p>
                        <p>Prix: $produit[1] euros/g</p>
                        <p>Catégorie : $produit[2]</p>
                        <a href='?page=suppproduit&id=$produit[0]'><button class='w3-button w3-white w3-border w3-round-large w3-margin w3-row w3-section w3-mobile'>Supprimer</button></a>
                        <a href='?page=modifproduit&id=$produit[0]'><button class='w3-button w3-white w3-border w3-round-large w3-margin w3-row w3-section w3-mobile'>Modifier</button></a>
                    </div>
                </div>
            </div>
            ";
        }
    ?>
</div>