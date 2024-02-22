<?php

//file contente le funzioni
include __DIR__ .'./utils/functions.php';

$duplicates_allowed_checked = !isset($_GET['allow-duplicates']) || !empty($_GET['allow-duplicates']) ? 'checked' : '';
$duplicates_prevent_checked = !isset($_GET['allow-duplicates']) && empty($_GET['allow-duplicates']) ? 'checked' : '';

$l_checked = isset($_GET['characters']) && in_array('L', $_GET['characters']) ? 'checked' : '';
$n_checked = isset($_GET['characters']) && in_array('N', $_GET['characters']) ? 'checked' : '';
$s_checked = isset($_GET['characters']) && in_array('S', $_GET['characters']) ? 'checked' : '';


//metto in ascolto il form per accogliere la length dell'utente da utilizzare come parametro per la funzione getRandomPassword,
//successivamente salvo la variabile ottenuta tramite $SERVER per riutilizzarla nella pagina in cui reinderizzo l'utente


if(isset($_GET['length'])){
    $duplicates_allowed = $_GET['allow-duplicates'] || false;

    $allowed_characters = $_GET['characters'] ?? [];
    $error = getRandomPassword($_GET['length'], $duplicates_allowed, $allowed_characters); //error restituisce true o false

    if($error === false) header('Location: success.php');
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

            <?php if(isset($error)) : ?>
                <div class="alert alert-danger mb-3" role="alert">
                    <?= $error ?>
                </div>
            <?php endif  ?>
            
            <form action="" method="GET">

                <!--Lunghezza password-->
                <div class="d-flex justify-content-around">
                    <label for="length">Lunghezza Password:</label>
                    <input type="number" name="length" id="length"  value ="<?= $_GET['length'] ?? 5?>">
                </div>

                <!--On/off ripetione caratteri-->
                <div class="d-flex justify-content-around my-5">
                    <div>
                        <span class="" >Consenti ripetizioni di uno o più caratteri:</label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="allow-duplicates">Si</label>
                        <input class="form-check-input" type= "radio"  name="allow-duplicates" id="allow-duplicates" <?= $duplicates_allowed_checked ?> value="1">
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="prevent-duplicates">No</label>
                        <input class="form-check-input" type= "radio"  name="allow-duplicates" id="prevent-duplicates" <?= $duplicates_prevent_checked ?> value="0">
                    </div>
                </div>

                <!--Selezione tipologia caratteri-->
                <div class="d-flex justify-content-around">
                    <div class="form-check">
                        <label class="form-check-label" for="letters">Lettere</label>
                        <input class="form-check-input" type="checkbox" id="letters" name="characters[]" value="L" <?= $l_checked ?>>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="numbers">Numeri</label>
                        <input class="form-check-input" type="checkbox" id="numbers" name="characters[]" value="N" <?= $n_checked ?>>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label" for="symbols">Simboli</label>
                        <input class="form-check-input" type="checkbox" id="symbols" name="characters[]" value="S" <?= $s_checked ?>>
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
