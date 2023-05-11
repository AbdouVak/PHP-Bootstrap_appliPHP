<?php    
    session_start();
    ob_start();
?>

    <form action="traitement.php?action=ajoutProduit" method="POST" class=" container-sm d-flex flex-row justify-content-around bg-warning rounded-4 shadow mt-5" enctype="multipart/form-data">
    <div class="">
        
        <div class="d-flex justify-content-around flex-row  bg-secondary mt-5 mb-5 shadow rounded-2">
            <div><p class="fs-2 text-warning mt-3 mb-3 ms-3" >Nom du produit</p></div>
            <p class="d-flex justify-content-center">
                <label class=" me-2 ms-4 mt-4">
                    <input type="text" name="name">
                </label class=" me-2 ms-4 mt-4">
            </p>         
        </div>
        

        <div class="d-flex justify-content-around flex-row  bg-secondary mt-5 mb-5 shadow rounded-2">
            <div><p class="fs-2 text-warning mt-3 mb-3 ps-3" >Prix du produit</p></div>
            <p class="d-flex justify-content-center">
                <label class=" me-2 ms-4 mt-4">
                    <input type="number" step="any" name="price">
                </label>
            </p>              
        </div>
        

        <div class="d-flex justify-content-around flex-row  bg-secondary mt-5 mb-5 shadow rounded-2">
            <div><p class="fs-2 text-warning mt-3 mb-3 ps-3" >Quantité désiré</p></div>
            <p class="d-flex justify-content-center">
                <label class=" me-2 ms-4 mt-4">
                    <input type="number" name="qtt" value="">
                </label>
            </p>
        </div>

        <div class="d-flex justify-content-Center  align-items-center flex-row  bg-secondary mt-5 mb-5 p-1 shadow rounded-2">
            <label for="file" class="fs-2 text-warning mt-3 mb-3 ps-3"> Image produit :</label>
            <input type="file" name="file" class="pe-2 ps-2 text-warning">
        </div>
        
    </div>

    <div class="d-flex justify-content-center align-items-center flex-column  mt-5">
        <p>
            <input type="submit"  name="submit" value="Ajouter le produit" class="fs-2 bg-secondary text-white border border-0 rounded-5 p-3 shadow-lg ">
        </p>

        <p>
            <?php
            if(isset($_SESSION['message'])){
                echo $_SESSION['message'];
                unset( $_SESSION['message']);
            }
            ?>
        </p>
    </div>
    </form>

    <?php
    $titre = "Ajout produit";
    $contenu = ob_get_clean();
    require "template.php";
