<?php    
    session_start();
    ob_start();
?>

    <form action="traitement.php?action=ajoutProduit" method="post" class=" container-sm d-flex flex-row justify-content-around bg-warning rounded-4 shadow mt-5">
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

        <?php 
            if(isset($_FILES['file'])){
                $tmpName = $_FILES['file']['tmp_name'];
                $name = $_FILES['file']['name'];
                $size = $_FILES['file']['size'];
                $error = $_FILES['file']['error'];
                $tabExtension = explode('.', $name);

                $extension = strtolower(end($tabExtension));

                $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                //Taille max que l'on accepte
                $maxSize = 400000;
                if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
                    move_uploaded_file($_SESSION['image']);
                }
                else{
                    echo "Une erreur est survenue";
                }
            }
        ?>

        <div class="d-flex justify-content-Center  align-items-center flex-row  bg-secondary mt-5 mb-5 p-1 shadow rounded-2">
            <label for="file"class="fs-2 text-warning mt-3 mb-3 ps-3"> Image produit :</label>
            <input type="file" name="file" class="pe-2 ps-2 text-warning">
            <button type="submit"class="fs-2 bg-warning text-secondary border border-0 rounded-5 mt-3 mb-3 p-2 shadow-lg">Enregistrer</button>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center flex-column  mt-5">
        <p >
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
