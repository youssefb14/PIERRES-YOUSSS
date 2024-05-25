<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PAGE VITRINE (mini-projet)</title>

        <!-- Importation du framework W3.CSS -->
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <!-- Importation de FontAwesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Autre importation-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-teal.css">
        <!-- Importation pour bandeau de presentation-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>

    <body>
        
        <div class="w3-quarter w3-container">
            
            <!-- ajoute menu -->
            <?php include 'menu.php';?>

        </div>
         
        <div class="w3-threequarter w3-container">
            
            <!-- ajoute entete -->
            <?php include 'entete.php';?>
            

            <!-- ajoute bandeau de presentation -->
            <?php include 'bandeau_presentation.php';?>
            
            <!-- ajoute page -->
            <?php 
                $page_a_afficher = "";
                if (isset($_GET["page"]) && $_GET["page"]) 
                {
                    $page_a_afficher = $_GET["page"];
                } 
                else 
                {
                    $page_a_afficher = "init";
                }
                include $page_a_afficher . ".php" ;
            ?>

            <!-- ajoute pied -->
            <?php include 'pied.php';?>

        </div>


    </body>
</html>
