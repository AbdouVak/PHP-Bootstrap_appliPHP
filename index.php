<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Ajout Produit</title>
</head>
<body class="bg-secondary">

    <header>
        <nav class="d-flex justify-content-center gap-5 mt-5">
            <button type="button" class="btn btn-warning position-relative">
                Home <svg width="1em" height="1em" viewBox="0 0 16 16" class="position-absolute top-100 start-50 translate-middle mt-1" fill="#212529" xmlns="http://www.w3.org/2000/svg"></svg>
            </button>

            <button type="button" onclick="location.href='recap.php'" class="btn btn-warning position-relative">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16"><path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9H2zM1 7v1h14V7H1zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5zm2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/></svg>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-dark"> <span class="visually-hidden">unread messages</span></span>
            </button>

        </nav>
        <h1 class="d-flex justify-content-center text-warning mt-5">Ajout produit</h1>
    </header>

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
    </div>

    <p class="d-flex justify-content-center align-items-center">
        <input type="submit"  name="submit" value="Ajouter le produit" class="fs-2 bg-secondary text-white border border-0 rounded-5 p-3 shadow-lg">
    </p>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>
</html>