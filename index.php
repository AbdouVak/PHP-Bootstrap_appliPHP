<?php
session_start();
ob_start();
?>
<h1 class="d-flex justify-content-center mt-5 text-primary">Ajouter Votre produit</h1>
<form action="traitement.php?action=ajoutProduit" method="POST" class=" container-sm  w-50 d-flex flex-column bg-primary mt-5 rounded-4 shadow-lg" enctype="multipart/form-data">
    
    <div class="mt-5 ">

        <div class="d-flex flex-row justify-content-between bg-light rounded-4 shadow">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5"> <p>Nom du produit</p> </div>     <!-- |------------------------------------------------| -->
            <p>                                                                             <!-- |                                  ------------- | -->
                <label class="pt-4 pb-1 pe-5">                                              <!-- | Nom du Poduit                    |   pomme   | | -->
                    <input type="text" name="name">                                         <!-- |                                  ------------- | -->
                </label>                                                                    <!-- |------------------------------------------------| -->
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between bg-light rounded-4 shadow mt-4">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5"> <p>Prix du produit</p> </div>     <!-- |------------------------------------------------| -->
            <p>                                                                              <!-- |                                  ------------- | -->
                <label class="pt-4 pb-1 pe-5">                                               <!-- | Prix du produit                  |   0.36    | | -->
                    <input type="number" step="any" name="price">                            <!-- |                                  ------------- | -->
                </label>                                                                     <!-- |------------------------------------------------| -->
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between bg-light rounded-4 shadow mt-4">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5"> <p>Quantité désiré</p> </div>     <!-- |------------------------------------------------| -->
            <p>                                                                              <!-- |                                  ------------- | -->
                <label class="pt-4 pb-1 pe-5">                                               <!-- | Quantité désiré                  |     5     | | -->
                <input type="number" name="qtt">                                             <!-- |                                  ------------- | -->
                </label>                                                                     <!-- |------------------------------------------------| -->
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between bg-light mt-4 rounded-4 shadow">    <!-- |--------------------------------------------------------| -->
            <label for="file" class="fs-2 text-primary pt-3 pb-3 ps-5"> Image produit</label>   <!-- |                                  --------------------- | -->
            <input type="file" name="file" class="pt-4 pb-1 pe-5 fs-5 text-primary">            <!-- |  Image produit                   | choisir un fichier| | -->
        </div>                                                                                  <!-- |                                  --------------------- | -->
                                                                                                <!-- |--------------------------------------------------------| -->
    </div>

    <div class="d-flex justify-content-center align-items-center flex-column  mt-5">                                                                        <!-- |------------------------------| -->
        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-success text-light fs-2 border border-0 rounded-5 p-3 shadow-lg ">     <!-- |      Ajouter le produit      | -->
        <p>                                                                                                                                                 <!-- |------------------------------| -->
            <?php
            if (isset($_SESSION['message'])) {      //  |--------------------------------|
                echo $_SESSION['message'];          //  | Le produit a bien était ajouté |
                unset($_SESSION['message']);        //  |--------------------------------|
            } 
            else {                                  //  |--------------------------------------|
                unset($_SESSION['message']);        //  | Le produit n'a pas bien était ajouté |
            }                                       //  |--------------------------------------|
            ?>
        </p>
    </div>
</form>

<?php
$titre = "Ajout produit";
$contenu = ob_get_clean();
require "template.php";
