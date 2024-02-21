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
                <div class="d-flex justify-content-between">
                    <label for="length">Lunghezza Password:</label>
                    <input type="number" name="length" id="length" value="">
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
