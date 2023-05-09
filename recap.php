<?php    
    session_start();
    ob_start();
?>

<h1 class="d-flex justify-content-center  text-warning mt-5">Votre panier</h1>
<?php 
    //vérifie clé "products" du tableau $_SESSION n'existe pas : !isset()
    //soit clé existe mais ne contient aucune donnée : empty()
    if(!isset($_SESSION['products'])||empty($_SESSION['products'])){
        //affiche à utilisateur message prévenant aucun produit existe en session
        echo "<div class='container-sm d-flex flex-row justify-content-around bg-warning rounded-4 shadow mt-5'>
                <p class='fs-2 text-secondary mt-3 mb-3 ps-3'>Aucun produit en session...</p>
            </div>";
    }else{
        echo "<div class='container-sm bg-warning  rounded-4 shadow mt-5'><table class='table'>",
                "<thread ",
                    "<tr>",
                        "<th class='fs-2 text-secondary '>#</th>",
                        "<th class='fs-2 text-secondary'>Nom</th>",
                        "<th class='fs-2 text-secondary'>Prix</th>",
                        "<th class='fs-2 text-secondary'>Quantité</th>",
                        "<th class='fs-2 text-secondary'>Total</th>",
                        "<th class='fs-2 text-secondary'>Delete  products</th>",
                    "</tr>",
                "</thread>",
                "<tbody>";
            $totalGeneral = 0;
            //boucle itérative foreach efficace pour exécuter, produit par produit
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td class='fs-2 text-secondary'>".$index."</td>",
                        "<td class='fs-2 text-secondary'>".$product['name']."</td>",
                        //fonction number_format() permet de modifier l'affichage d'une valeur numérique
                        "<td class='fs-2 text-secondary'>".number_format($product['price'],2,",","&nsbp;")." €</td>",
                        "<td class='fs-2 text-secondary'>
                            <a href='traitement.php?action=qttMinus&id=$index' class='text-muted text-decoration-none'> - </a>".
                            $product['qtt'].
                            "<a href='traitement.php?action=qttPlus&id=$index'class='text-muted text-decoration-none'> + </a>".
                        "</td>",
                        
                        "<td class='fs-2 text-secondary'>".number_format($product['total'],2,","," ")." €</td>",
                        "<td class='fs-2 text-secondary'>".
                            "<a href='traitement.php?action=delete&id=$index' class='text-muted text-decoration-none'>Delete</a>".
                        "</td>",
                    "</tr>";
                    $totalGeneral +=$product['total'];
            }
            echo "<tr>",
                    "<td class='fs-2 text-secondary' colspan=4>Total général:</td>",
                    "<td class='fs-2 text-secondary'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                    "<td class='fs-2 text-secondary'>".
                            "<a href='traitement.php?action=deleteAll' class='text-muted text-decoration-none' >DeleteALL</a>".
                    "</td>",
                    "</tbody>",
             "</table></div>";
    }
?>
    <?php
    $titre = "Récapitulatif des produits";
    $contenu = ob_get_clean();
    require "template.php";
