<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    require_once "./templates/header.php";
    require_once "./classes/dbh.class.php";
    require_once "./classes/klant.class.php";

    if (isset($_POST['submit'])) {
        $user = new Klant();
        $klantid = $_POST['klantid'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $adres = $_POST['adres'];
        $plaats = $_POST['plaats'];
        $zip = $_POST['zip'];

        $user->createKlant($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip);
    }
    ?>
    <div class="container">
        <form class="row g-3 mt-5" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <div class="col-md-6">
                <label for="inputEmail4" class="form-label">Voornaam</label>
                <input type="text" name="voornaam" class="form-control" id="voornaam"
                    value="<?php echo $_POST['voornaam'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label for="inputPassword4" class="form-label">Achternaam</label>
                <input type="text" name="achternaam" class="form-control" id="achternaam"
                    value="<?php echo $_POST['achternaam'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="<?php echo $_POST['email'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoord"
                    value="<?php echo $_POST['wachtwoord'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress2" class="form-label">Adres</label>
                <input type="text" name="adres" class="form-control" id="adres"
                    value="<?php echo $_POST['adres'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label for="inputCity" class="form-label">Plaats</label>
                <input type="text" name="plaats" class="form-control" id="plaats"
                    value="<?php echo $_POST['plaats'] ?? '' ?>">
            </div>
            <div class="col-md-6">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $_POST['zip'] ?? '' ?>">
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Registreren</button>
            </div>
        </form>
    </div>
</body>

</html>