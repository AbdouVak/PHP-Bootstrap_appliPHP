<?php 
    //démarre session sur le serveur pour l'utilisateur courant /serveur enregistre  cookie PHPSESSID dans navigateur client
    session_start();

    // limite accès à traitement.php par les requêtes HTTP venant de la soumission du formulaire
    if(isset($_POST['submit'])){

        //filtre supprime chaîne caractères qui contient caractères spéciaux et balise HTML
        $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
        //validera le prix si c'est nombre à virgule / permet utilisation du caractère "," ou "." pour la décimale
        $price=filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
        //validera la quantité que si c'est un nombre entier différent de zéro
        $qtt=filter_input(INPUT_POST,"qtt",FILTER_VALIDATE_INT);

        //vérifie implicitement si chaque variable contient valeur jugée positive par PHP 
        if($name && $price && $qtt){
            //tableau associatif $product
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            //stocke nos données en session en les ajoutant au tableau $_SESSION
            $_SESSION['products'][]=$product;
        }
    }
    header("Location:index.php");
    
?>