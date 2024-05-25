<!-- Barre lateral -->
<nav class="w3-sidebar w3-light-grey w3-bar-block w3-round-xlarge w3-row w3-mobile">
    <?php
        
        echo "
            <div class='w3-container w3-display-container w3-padding-16 w3-center w3-row w3-mobile'>
                <h3 class='w3-wide'><b>PIERRES'<wbr>YOUSSS</b></h3>
                <img src='medias/logo.png' class='w3-image w3-center'>
            </div>
        ";

        echo "<br><br>";

        // Declaration 1
        $pierre_a["Page principale"] = "index.php?page=init";
        $pierre_a["Liste des produits"] = "index.php?page=produits";
        $pierre_a["Nouveau produit"] = "index.php?page=modifproduit";
        // $pierre_a["Formulaire"] = "index.php?page=modifproduit";

        while (list($nom, $pierre) = each($pierre_a)) 
        {
            echo "
            <div class='w3-large w3-text-grey w3-row w3-mobile' style='font-weight:bold'>
                <a href=\"$pierre\" class='w3-bar-item w3-button'>$nom</a>
            </div>
            ";
        }
    ?>
</nav>