<?php
include "./templates/header.php";
include "./templates/footer.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container-sm">
        <form class="mt-5">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gebruikersnaam</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Voer hier uw gebruikersnaam</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Wachtwoord</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Voer hier uw wachtwoord</div>
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </form>
    </div>
</body>

</html>