<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des rpoduits</title>
</head>
<body>
    <?php 
        //vérifie clé "products" du tableau $_SESSION n'existe pas : !isset()
        //soit clé existe mais ne contient aucune donnée : empty()
        if(!isset($_SESSION['products'])||empty($_SESSION['products'])){
            //affiche à utilisateur message prévenant aucun produit existe en session
            echo "<p>Aucun produit en session...</p>";
        }else{
            echo "<table>",
                    "<thread>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thread>",
                    "<tbody>";
                    //boucle itérative foreach efficace pour exécuter, produit par produit
                    foreach($_SESSION['products'] as $index => $products){
                        echo "<tr>",
                                "<td>".$index."</td>",
                                "<td>".$products['name']."</td>",
                                //fonction number_format() permet de modifier l'affichage d'une valeur numérique
                                "<td>".number_format($products['price'],2,",","&nsbp;")." €</td>",
                                "<td>".$products['qtt']."</td>",
                                "<td>".number_format($products['total'],2,",","&nsbp;")." €</td>",
                              "</tr>";
                    }
            echo    "</tbody>",
                "</table>";
        }
    ?>
</body>
</html>