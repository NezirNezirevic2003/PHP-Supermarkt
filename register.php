<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
session_start();

include "classes/beheerder.class.php";
include_once "classes/dbh.class.php";
include "./templates/header.php";
require_once "./classes/registratie.validator.class.php";
include "./includes/autoload.inc.php";

if (isset($_POST['submit'])) {

    $validation = new RegistratieValidator($_POST);
    $errors = $validation->validateForm();

    if (!$errors) {

        $beheerder = new Beheerder();
        $klantid = $_POST['klantid'];
        $voornaam = $_POST['voornaam'];
        $achternaam = $_POST['achternaam'];
        $email = $_POST['email'];
        $wachtwoord = $_POST['wachtwoord'];
        $adres = $_POST['adres'];
        $plaats = $_POST['plaats'];
        $zip = $_POST['zip'];

        $beheerder->createKlant($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip);
    }
}
?>

<body>
    <div class="container">
        <form class="row g-3 mt-5" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <div class="col-md-6 mt-3">
                <label for="inputEmail4" class="form-label">Voornaam</label>
                <input type="text" name="voornaam" class="form-control" id="voornaam"
                    value="<?php echo $_POST['voornaam'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['voornaam'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <label for="inputPassword4" class="form-label">Achternaam</label>
                <input type="text" name="achternaam" class="form-control" id="achternaam"
                    value="<?php echo $_POST['achternaam'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['achternaam'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email"
                    value="<?php echo $_POST['email'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['email'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="wachtwoord"
                    value="<?php echo $_POST['wachtwoord'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['wachtwoord'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <label for="inputAddress2" class="form-label">Adres</label>
                <input type="text" name="adres" class="form-control" id="adres"
                    value="<?php echo $_POST['adres'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['adres'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <label for="inputCity" class="form-label">Plaats</label>
                <input type="text" name="plaats" class="form-control" id="plaats"
                    value="<?php echo $_POST['plaats'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['plaats'] ?? '' ?>
                </div>
            </div>
            <div class="col-md-6 mt-3">
                <label for="inputZip" class="form-label">Zip</label>
                <input type="text" name="zip" class="form-control" id="zip" value="<?php echo $_POST['zip'] ?? '' ?>">
                <div class="error">
                    <?php echo $errors['zip'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Registreren</button>
            </div>
        </form>
</body>

</html>