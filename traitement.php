<?php 
    //démarre session sur le serveur pour l'utilisateur courant /serveur enregistre  cookie PHPSESSID dans navigateur client
    session_start();
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case "ajoutProduit" :
                    // limite accès à traitement.php par les requêtes HTTP venant de la soumission du formulaire
                    if(isset($_POST['submit'])){
                        //filtre supprime chaîne caractères qui contient caractères spéciaux et balise HTML
                        $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
                        //validera le prix si c'est nombre à virgule / permet utilisation du caractère "," ou "." pour la décimale
                        $price=filter_input(INPUT_POST,"price",FILTER_VALIDATE_FLOAT,FILTER_FLAG_ALLOW_FRACTION);
                        //validera la quantité que si c'est un nombre entier différent de zéro
                        $qtt=filter_input(INPUT_POST,"qtt",FILTER_VALIDATE_INT);
                        
                    
                        //vérifie implicitement si chaque variable contient valeur jugée positive par PHP 
                        if($name && $price>0 && $qtt>0){
                            //tableau associatif $product
                            $product = [
                                "name" => $name,
                                "price" => $price,
                                "qtt" => $qtt,
                                "total" => $price*$qtt
                            ];
                            //stocke nos données en session en les ajoutant au tableau $_SESSION
                            $_SESSION['products'][]=$product;
                            $_SESSION['message'] = "<div class='alert alert-success fs-2' role='alert'>Le produit a bien était ajouté</div>";
                        }else{
                            $_SESSION['message'] = "<div class='alert alert-danger fs-2' role='alert'>Le produit n'a pas bien était ajouté</div>";
                        }
                    }
                    // verifie si il contient des images
                    if(isset($_FILES['file'])){
                        echo "image";
                        $tmpName = $_FILES['file']['tmp_name'];
                        //stock le nom de l'image
                        $name = $_FILES['file']['name'];
                        //stock la valeur de la taille de l'image
                        $size = $_FILES['file']['size'];
                        //stock le numero de l'erreur de l'image
                        $error = $_FILES['file']['error'];
                        $tabExtension = explode('.', $name);

                        //change l'extension en miniscule
                        $extension = strtolower(end($tabExtension));
                        //crée une table avec les extention
                        $extensions = ['jpg', 'png', 'jpeg', 'gif'];
                        //Taille max que l'on accepte
                        $maxSize = 400000;

                        //verifie si les extention sont correct,que la taille est en dessous de la taille max et qu'il n'y a pas d'erreur
                        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){
                            $uniqueName = uniqid('', true);
                            //uniqid génère quelque chose comme ca : 5f586bf96dcd38.73540086
                            $file = $uniqueName.".".$extension;
                            //$file = 5f586bf96dcd38.73540086.jpg
                            move_uploaded_file($tmpName, './upload/'.$file);
                            $_SESSION['image'] = $file;
                        }
                        else{
                            echo "Une erreur est survenue";
                        }
                        header("Location:index.php");  
                    }
                    

                    
                    break;

            case "qttMinus" :
                if($_SESSION['products'][$_GET['id']]['qtt'] > 0) {
                    $_SESSION['products'][$_GET['id']]['qtt']--;
                    $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
                }
                if($_SESSION['products'][$_GET['id']]['qtt'] == 0) {
                    unset($_SESSION['products'][$_GET['id']]);
                }
                
                header("Location:recap.php");  
                break;

            case "qttPlus" :
                $_SESSION['products'][$_GET['id']]['qtt']++;
                $_SESSION['products'][$_GET['id']]['total'] = $_SESSION['products'][$_GET['id']]['qtt'] * $_SESSION['products'][$_GET['id']]['price'];
                header("Location:recap.php");
                break;    
            
           case "delete" :
                unset($_SESSION['products'][$_GET['id']]);
                header("Location:recap.php");
                break;

            case "deleteAll" :
                foreach($_SESSION['products'] as $index => $product){
                    unset($_SESSION['products'][$index]);
                }
                header("Location:recap.php");
                break;
        }
    }
?>