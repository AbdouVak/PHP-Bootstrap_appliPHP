<?php
session_start();
ob_start();
?>

<form action="traitement.php?action=ajoutProduit" method="POST" class=" container-sm  w-50 d-flex flex-column bg-primary mt-5 rounded-4 shadow-lg" enctype="multipart/form-data">
    <h1></h1>
    <div class="mt-5 ">

        <div class="d-flex flex-row justify-content-between bg-light rounded-4 shadow">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5">
                <p>Nom du produit</p>
            </div>
            <p class="">
                <label class="pt-4 pb-1 pe-5">
                    <input type="text" name="name">
                </label>
            </p>
        </div>


        <div class="d-flex flex-row justify-content-between bg-light mt-4 rounded-4 shadow">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5">
                <p>Prix du produit</p>
            </div>
            <p class="">
                <label class="pt-4 pb-1 pe-5">
                    <input type="number" step="any" name="price">
                </label>
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between bg-light mt-4 rounded-4 shadow">
            <div class="fs-2 text-primary pt-3 pb-2 ps-5">
                <p>Quantité désiré</p>
            </div>
            <p class="">
                <label class="pt-4 pb-1 pe-5">
                    <input type="number" name="qtt">
                </label>
            </p>
        </div>

        <div class="d-flex flex-row justify-content-between bg-light mt-4 rounded-4 shadow">
            <label for="file" class="fs-2 text-primary pt-3 pb-3 ps-5"> Image produit</label>
            <input type="file" name="file" class="pt-4 pb-1 pe-5 fs-5 text-primary">
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center flex-column  mt-5">
        <input type="submit" name="submit" value="Ajouter le produit" class="btn btn-success text-light fs-2 border border-0 rounded-5 p-3 shadow-lg ">

        <p>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
                unset($_SESSION['message']);
            } else {

                unset($_SESSION['message']);
            }
            ?>
        </p>
    </div>
</form>

<?php
$titre = "Ajout produit";
$contenu = ob_get_clean();
require "template.php";
