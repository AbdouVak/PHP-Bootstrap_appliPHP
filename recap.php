<?php    
    session_start();
    ob_start();
?>
<!-------------------------------------Votre Panier---------------------------------------->
<h1 class="d-flex justify-content-center  text-primary mt-5">Votre panier</h1>
<body>
  
  
</body>

<?php 
    //vérifie clé "products" du tableau $_SESSION n'existe pas : !isset()
    //soit clé existe mais ne contient aucune donnée : empty()
    if(!isset($_SESSION['products'])||empty($_SESSION['products'])){

        //  |--------------------------------------------------------------------------------|
        //  |                           Aucun Produit en session...                          |
        //  |--------------------------------------------------------------------------------|
        echo    "<div class='container-sm d-flex flex-row justify-content-around bg-primary rounded-4 shadow-lg mt-5'>
                    <p class='fs-2 text-light mt-3 mb-3 ps-3'>Aucun produit en session...</p>
                </div>";

    }else{

        //      |--------------------------------------------------------------------|
        //      |#     Nom     Prix    Quantité_produit    Total   Supprimer produit | 
        //      |--------------------------------------------------------------------|
        echo    "<div class='container-sm bg-primary  rounded-4 shadow-lg mt-5'><table class='table'>",
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

            
            foreach($_SESSION['products'] as $index => $product){ //boucle itérative foreach efficace pour exécuter, produit par produit

                //une boite de dialog pour comfirmer la suppression du produit qu'on on appuira sur le bouton Supprimer
                echo    "<div class='modal fade' id='deleteModal' tabindex='-1' aria-labelledby='deleteModalLabel' aria-hidden='true'>",    //  Pommes                                    x
                            "<div class='modal-dialog'>",                                                                                   //  _____________________________________________
                                "<div class='modal-content'>",                                                                              //
                                    "<div class='modal-header'>",                                                                           //  Prix : ???
                                        "<h1 class='modal-title fs-2' id='deleteModalLabel'>".$product['name']."</h1>",                     //
                                        "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>",     //  Quantités: ???
                                    "</div>",                                                                                               //
                                    "<div class='modal-body fs-3'>",                                                                        //  Total: ???
                                        "<p>Prix: ".number_format($product['total'],2,","," ")." €</p><br>",                                //
                                        "<p>Quantité: ".$product['qtt']."</p><br>",                                                         //  _____________________________________________
                                        "<p>Total: ".number_format($product['total'],2,","," ")." €</p><br>",                               //             -----------------  -------------
                                    "</div>",                                                                                               //             |Ne pas Suprimer|  | Supprimer |
                                    "<div class='modal-footer'>",                                                                           //             -----------------  -------------
                                        "<button type='button' class='btn btn-success' data-bs-dismiss='modal'>Ne pas supprimer</button>",
                                        "<a href='traitement.php?action=delete&id=$index' type='button' class='btn btn-danger text-white' >Supprimer<a>",
                                    "</div>",
                                "</div>",
                            "</div>",
                        "</div>";

                //Affiche une image du produit on on clique sur le nom 
                echo    "<div class='modal fade' id='imgModal' tabindex='-1' aria-labelledby='imgModalLabel' aria-hidden='true'>",     //   Pommes
                            "<div class='modal-dialog'>",                                                                              //   ____________________
                                "<div class='modal-content'>",                                                                         //          ,#((//   
                                    "<div class='modal-header'>",                                                                      //       #%(###(%((##((
                                        "<h1 class='modal-title fs-5' id='imgModalLabel'>".$product['name']."</h1>",                   //      %%%%%#%& /#&&& 
                                    "</div>",                                                                                          //      &&%%%%%&%%%&&&  
                                    "<div class='modal-body'>",                                                                        //      %&%&%(%#%%%&&&
                                        "<img src='./upload/".$_SESSION['image']."' width='100%'>",                                    //       (%%%%%%%&&&# 
                                    "</div>",                                                                                          //        ,&%%%%&&* 
                                "</div>",
                            "</div>",
                        "</div>";


                //       |------------------------------------------------------------------------------------------------------------|
                //       |Index_produit     Nom_produit     Prix_produit    - Quantité_produit +    Total_produit   Supprimer_produit |
                //       |------------------------------------------------------------------------------------------------------------|
                echo    "<tr>",

                            //                    |----------------------------------------------------------------------------|
                            //                    | Index_produit        ???         ???         ? ??? ?         ?           ? |
                            //                    |----------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>".$index."</td>",

                            //                    |-------------------------------------------------------------------------|
                            //                    |???        Nom_produit         ???         ? ??? ?         ?           ? | 
                            //                    |-------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>
                                <button type='button' class='btn fs-2 text-light' data-bs-toggle='modal' data-bs-target='#imgModal'>
                                    ".$product['name']."
                                </button>
                            </td>",

                            //                    |--------------------------------------------------------------------------|
                            //                    |???        ???         Prix_produit         ? ??? ?         ?           ? | 
                            //                    |--------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>".number_format($product['price'],2,","," ")." €</td>",//fonction number_format() permet de modifier l'affichage d'une valeur numérique

                            //                    |------------------------------------------------------------------------------|
                            //                    |???        ???         ???         - Quantité_produit +         ?           ? | 
                            //                    |------------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>
                                <a href='traitement.php?action=qttMinus&id=$index' class='btn btn-primary fs-2'> - </a>".
                                    $product['qtt'].
                                "<a href='traitement.php?action=qttPlus&id=$index'class='btn btn-primary fs-2'> + </a>".
                            "</td>",
                            
                            //                    |-----------------------------------------------------------------------------|
                            //                    |???        ???         ???         ? ??? ?         Total_produit           ? |
                            //                    |-----------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>".number_format($product['total'],2,","," ")." €</td>",
                            
                            //                    |---------------------------------------------------------------------------------|
                            //                    |???        ???         ???         ? ??? ?         ?           Supprimer_produit |
                            //                    |---------------------------------------------------------------------------------|
                            "<td class='fs-2 text-light'>
                                <a data-bs-toggle='modal' data-bs-target='#deleteModal'type='button' class='btn btn-primary fs-2 text-white' >Supprimer<a>
                                
                            </td>",
                        "</tr>";

                    //calcul le total de tout les produit
                    $totalGeneral +=$product['total'];
            }

            //       |-------------------------------------------------------------------------|
            //       |Total général                                   Total   Supprimer_produit| 
            //       |-------------------------------------------------------------------------|
            echo "<tr>",

                    //      |-------------------------------------------------------------------------|
                    //      |Total général                                            ???          ???| 
                    //      |-------------------------------------------------------------------------|
                    "<td class='fs-2 text-light' colspan=4>Total général:</td>",

                    //      |-------------------------------------------------------------------------|
                    //      |???                                             Total                 ???| 
                    //      |-------------------------------------------------------------------------|
                    "<td class='fs-2 text-light'><strong>".number_format($totalGeneral,2,",","&nbsp;")."&nbsp;€</strong></td>",

                    //      |-------------------------------------------------------------------------|
                    //      |???                                             ???     Supprimer_produit| 
                    //      |-------------------------------------------------------------------------|
                    "<td class='fs-2 text-light'><a href='traitement.php?action=deleteAll' class='btn btn-primary fs-2' >DeleteALL</a></td>",
                    "</tbody>",
             "</table></div>";
             
    }
?>
    <?php
    $titre = "Récapitulatif des produits";
    $contenu = ob_get_clean();
    require "template.php";
