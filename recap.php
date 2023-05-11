<?php    
    session_start();
    ob_start();
?>

<h1 class="d-flex justify-content-center  text-primary mt-5">Votre panier</h1>
<body>
  
  
</body>

<?php 
    //vérifie clé "products" du tableau $_SESSION n'existe pas : !isset()
    //soit clé existe mais ne contient aucune donnée : empty()
    
    
    if(!isset($_SESSION['products'])||empty($_SESSION['products'])){
        //affiche à utilisateur message prévenant aucun produit existe en session
        echo "<div class='container-sm d-flex flex-row justify-content-around bg-primary rounded-4 shadow-lg mt-5'>
                <p class='fs-2 text-light mt-3 mb-3 ps-3'>Aucun produit en session...</p>
            </div>";
    }else{
        echo "<div class='container-sm bg-primary  rounded-4 shadow-lg mt-5'><table class='table'>",
                "<thread ",
                    "<tr>",
                        "<th class='fs-2 text-light '>#</th>",
                        "<th class='fs-2 text-light'>Nom</th>",
                        "<th class='fs-2 text-light'>Prix</th>",
                        "<th class='fs-2 text-light'>Quantité</th>",
                        "<th class='fs-2 text-light'>Total</th>",
                        "<th class='fs-2 text-light'>Supprimer produit</th>",
                    "</tr>",
                "</thread>",
                "<tbody>";
            $totalGeneral = 0;
            //boucle itérative foreach efficace pour exécuter, produit par produit
            foreach($_SESSION['products'] as $index => $product){
                
                echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <h1 class='modal-title fs-5' id='exampleModalLabel'>".$product['name']."</h1>
                            </div>
                            <div class='modal-body'>
                            <img src='./upload/".$_SESSION['image']."' width='100%'>
                            </div>
                        </div>
                        </div>
                    </div>",

                    "<tr>",
                        "<td class='fs-2 text-light'>".$index."</td>",

                        "<td class='fs-2 text-light'>
                            <button type='button' class='btn fs-2 text-light' data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                ".$product['name']."
                            </button>
                        </td>",

                        //fonction number_format() permet de modifier l'affichage d'une valeur numérique
                        "<td class='fs-2 text-light'>".number_format($product['price'],2,","," ")." €</td>",
                        "<td class='fs-2 text-light'>
                            <a href='traitement.php?action=qttMinus&id=$index' class='btn btn-primary fs-2'> - </a>".
                            $product['qtt'].
                            "<a href='traitement.php?action=qttPlus&id=$index'class='btn btn-primary fs-2'> + </a>".
                        "</td>",
                        
                        "<td class='fs-2 text-light'>".number_format($product['total'],2,","," ")." €</td>",
                        "<td class='fs-2 text-light'>
                            <button type='button' class='btn fs-2 text-light' data-bs-toggle='modal' data-bs-target='#deleteModal'>
                                Supprimer
                            </button>
                        </td>",
                    "</tr>";

                    $totalGeneral +=$product['total'];
            }
            echo "<tr>",
                    "<td class='fs-2 text-light' colspan=4>Total général:</td>",
                    "<td class='fs-2 text-light'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",
                    "<td class='fs-2 text-light'>".
                            "<a href='traitement.php?action=deleteAll' class='btn btn-primary fs-2' >DeleteALL</a>".
                    "</td>",
                    "</tbody>",
             "</table></div>";
             echo "<div class='modal fade' id='deleteModal' tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header'>
                            <h1 class='modal-title fs-2' id='deleteModalLabel'>".$product['name']."</h1>
                            <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                            </div>
                            <div class='modal-body fs-3'>
                            <p>Prix: ".number_format($product['total'],2,","," ")." €</p><br>
                            <p>Quantité: ".$product['qtt']."</p><br>
                            <p>Total: ".number_format($product['total'],2,","," ")." €</p><br>
                            </div>
                            <div class='modal-footer'>
                            <button type='button' class='btn btn-success' data-bs-dismiss='modal'>Ne pas supprimer</button>
                            <form action='traitement.php?action=delete' method='POST'> <button  type='button' class='btn btn-danger' data-bs-dismiss='modal'>supprimer</button></form>
                        </div>
                        </div>
                        </div>
                    </div>";
    }
?>
    <?php
    $titre = "Récapitulatif des produits";
    $contenu = ob_get_clean();
    require "template.php";
