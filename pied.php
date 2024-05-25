<!-- Pied de page -->
<footer class=" w3-container w3-margin-top w3-center w3-teal w3-row w3-mobile" >
    <div>
        <?php
            // Date du Jour
            setlocale (LC_TIME, 'fr_FR.utf8','FRA'); 
            echo (strftime("%A %d %B"));
            

            // Declaration souspages
                
            $pierre_a["Politique de confidentialité"] = "index.php?page=X_Politique_de_confidentialite";
            $pierre_a["Conditions générales de vente"] = "index.php?page=X_Conditions_generales_de_vente";

            while (list($nom, $pierre) = each($pierre_a)) 
            {
                echo "
                    <div>
                        <a href=\"$pierre\" class='w3-text-white w3-row w3-mobile' >$nom</a>
                    </div>
                ";
            }

            echo'<br>';
            
        ?>
    </div>

    <div>
        <div class="w3-third w3-container w3-row w3-mobile" >
            <h4>Boutique</h4>
            <p><i class="fa fa-fw fa-phone"></i> 0659743971</p>
            <p><i class="fa fa-fw fa-envelope"></i> yboudount84@gmail.com</p>
        </div>
        
        <div class="w3-container w3-third w3-row w3-mobile">
            <h4>On accepte </h4>
            <p><i class="fa fa-fw fa-cc-amex"></i> Paypal</p>
            <p><i class="fa fa-fw fa-credit-card"></i> Carte bancaire</p>
        </div>

        <div class="w3-container w3-third w3-row w3-mobile">
            <h4>Nos reseaux</h4>
            <div class="w3-container w3-display-container w3-padding-16 w3-quarter">
                <i class="fa fa-facebook-official w3-hover-opacity w3-large" ></i>
            </div>

            <div class="w3-container w3-display-container w3-padding-16 w3-quarter">
                <i class="fa fa-snapchat w3-hover-opacity w3-large"></i>
            </div>

            <div class="w3-container w3-display-container w3-padding-16 w3-quarter">
                <i class="fa fa-twitter w3-hover-opacity w3-large"></i>
            </div>

            <div class="w3-container w3-display-container w3-padding-16 w3-quarter">
                <i class="fa fa-pinterest-p w3-hover-opacity w3-large"></i><br>
            </div>
        </div>
    </div>    
</footer>