<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
include "classes/beheerder.class.php";
include_once "classes/dbh.class.php";
include "./templates/header.php";
require_once "./classes/login.validator.class.php";
include "./includes/autoload.inc.php";

if (isset($_POST['submit'])) {

    $validation = new LoginValidator($_POST);
    $errors = $validation->validateForm();

    if (!$errors) {
        $beheerder = new Beheerder();
        $voornaam = $_POST['voornaam'];
        $wachtwoord = $_POST['wachtwoord'];
        $_SESSION['voornaam'] = $voornaam;
        $beheerder->loginKlant($voornaam, $wachtwoord);
    }
}
?>

<body>
    <div class="container">
        <form class="mt-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Voornaam</label>
                <input type="text" name="voornaam" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp" placeholder="Voer hier uw voornaam in">
                <div class="error">
                    <?php echo $errors['voornaam'] ?? '' ?>
                </div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="exampleInputPassword1"
                    placeholder="Voer hier uw wachtwoord in">
                <div class="error">
                    <?php echo $errors['wachtwoord'] ?? '' ?>
                </div>
            </div>
            <div class="mb-3 mt-4">
                <button type="submit" name="submit" class="btn btn-primary btn-block">Inloggen</button>
            </div>
        </form>
    </div>
</body>

</html>