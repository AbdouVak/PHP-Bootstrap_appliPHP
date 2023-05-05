<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif des rpoduits</title>
</head>
<body class="bg-secondary">
        <nav class="d-flex justify-content-center gap-5 mt-5">
            <button type="button" onclick="location.href='index.php'" class="btn btn-warning position-relative">
                Home <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1" fill="#212529" xmlns="http://www.w3.org/2000/svg"></svg>
            </button>

            <button type="button" onclick="location.href='recap.php'" class="btn btn-warning position-relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"> <span class="visually-hidden">unread messages</span></span>
            </button>

        </nav>
        <h1 class="d-flex justify-content-center  text-warning mt-5">Votre panier</h1>
    <?php 

        //vérifie clé "products" du tableau $_SESSION n'existe pas : !isset()
        //soit clé existe mais ne contient aucune donnée : empty()
        if(!isset($_SESSION['products'])||empty($_SESSION['products'])){
            //affiche à utilisateur message prévenant aucun produit existe en session
            echo "<p>Aucun produit en session...</p>";
        }else{
            echo "<div class='container-sm bg-warning  rounded-4 shadow mt-5'><table class='table'>",
                    "<thread ",
                        "<tr>",
                            "<th class='fs-2 text-secondary '>#</th>",
                            "<th class='fs-2 text-secondary'>Nom</th>",
                            "<th class='fs-2 text-secondary'>Prix</th>",
                            "<th class='fs-2 text-secondary'>Quantité</th>",
                            "<th class='fs-2 text-secondary'>Total</th>",
                            "<th class='fs-2 text-secondary'>Delete</th>",
                        "</tr>",
                    "</thread>",
                    "<tbody>";
                $totalGeneral = 0;
                //boucle itérative foreach efficace pour exécuter, produit par produit
                foreach($_SESSION['products'] as $index => $product){
                    $index=$index+1;
                    echo "<tr>",
                            "<td class='fs-2 text-secondary'>".$index."</td>",
                            "<td class='fs-2 text-secondary'>".$product['name']."</td>",
                            //fonction number_format() permet de modifier l'affichage d'une valeur numérique
                            "<td class='fs-2 text-secondary'>".number_format($product['price'],2,",","&nsbp;")." €</td>",
                            "<td class='fs-2 text-secondary'>".$product['qtt']."</td>",
                            "<td class='fs-2 text-secondary'>".number_format($product['total'],2,",","&nsbp;")." €</td>",
                            "<td class='fs-2 text-secondary'>
                                <button type='button' class='btn btn-warning position-relative'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' class='bi bi-trash text.secondary' viewBox='0 0 16 16'>
                                        <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z'/>
                                        <path d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z'/>
                                    </svg>
                                </button>
                            </td>",
                        "</tr>";
                          $totalGeneral +=$product['total'];
                }
                echo "<tr>",
                        "<td class='fs-2 text-secondary' colspan=4>Total général:</td>",
                        "<td class='fs-2 text-secondary'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                    "</tbody>",
                 "</table></div>";
        }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>