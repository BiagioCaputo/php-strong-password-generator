<?php



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
<body class="bg-info">
    <header class="my-5">
        <div class="container text-center">
            <h1 >Strong Password Generator</h1>
            <h2 class="text-white">Genera una password sicura</h2>
        </div>
    </header>
    <main>
        <div class="container p-4 bg-white rounded">
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