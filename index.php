<?php

//avvio session
session_start();

//file contente le funzioni
include __DIR__ .'./utils/functions.php';



//metto in ascolto il form per accogliere la length dell'utente da utilizzare come parametro per la funzione getRandomPassword,
//successivamente salvo la variabile ottenuta tramite $SERVER per riutilizzarla nella pagina in cui reinderizzo l'utente
if(isset($_GET["length"])){
    $length = $_GET['length'];
    $password = getRandomPassword($length);
    $_SESSION['password'] = $password; 
    header('Location: success.php');
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>password-generator</title>
</head>
<body>
    <header class="my-5">
        <div class="container text-center">
            <h1 class="text-white mb-3">Strong Password Generator</h1>
            <h2 class="text-white">Genera una password sicura</h2>
        </div>
    </header>
    <main>
        <div class="container p-4 bg-white rounded mb-5">
            <form action="" method="GET">

                <!--Lunghezza password-->
                <div class="d-flex justify-content-around">
                    <label for="length">Lunghezza Password:</label>
                    <input type="number" name="length" id="length" value="">
                </div>

                <!--On/off ripetione caratteri-->
                <div class="d-flex justify-content-around my-5">
                    <div>
                        <span class="" >Consenti ripetizioni di uno o più caratteri:</label>
                    </div>
                    <div>
                        <div class="form-check">
                            <label class="form-check-label" for="yes-repeat">Si</label>
                            <input class="form-check-input" type="checkbox" name="yes-repeat" id="yes-repeat" <?= $checked ?? '' ?>>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="no-repeat">No</label>
                            <input class="form-check-input" type="checkbox" name="no-repeat" id="no-repeat" <?= $checked ?? '' ?>>                  
                        </div>
                    </div>
                </div>

                <!--Selezione tipologia caratteri-->
                <div class="d-flex justify-content-around">
                    <div class="form-check">
                        <label class="form-check-label" for="letters">Lettere</label>
                        <input class="form-check-input" type="checkbox" name="letters" id="letters" <?= $checked ?? '' ?>>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="numbers">Numeri</label>
                        <input class="form-check-input" type="checkbox" name="numbers" id="numbers" <?= $checked ?? '' ?>>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="symbols">Simboli</label>
                        <input class="form-check-input" type="checkbox" name="symbols" id="symbols" <?= $checked ?? '' ?>>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mt-5">Generate</button>
            </form>           
        </div>
    </main>
    
</body>
</html>

<style>
    body{
        background-color: #011532;
    }
</style>
