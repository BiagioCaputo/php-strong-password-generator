<?php
//avvio session per recuperare la password e salvarla in una variabile
session_start();
if(isset($_SESSION['password'])){
    $password = $_SESSION['password'];
    session_destroy();
} else{
    header('Location : index.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>password-generated</title>
</head>
<body>
    <div class="container py-5">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Password generata!</h4>
            <p>Ecco qui la tua password: <?php echo $password ?></p>
        </div>
    </div>
    <div class="text-center container my-5">
        <button type="submit" class="btn btn-primary mt-5"><a href="index.php" class="text-white">Torna indietro<a></button>
    </div>
    
</body>
</html>


<style>
    body{
        background-color: #011532;
    }
</style>