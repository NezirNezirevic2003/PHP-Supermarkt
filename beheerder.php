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
require_once 'classes/beheerder.class.php';
require_once 'classes/dbh.class.php';
include "./templates/header.php";

if (isset($_POST['submit'])) {

    $beheerder = new Beheerder();
    $gebruikersnaam = $_POST['gebruikersnaam'];
    $wachtwoord = $_POST['wachtwoord'];
    $beheerder->loginBeheerder($gebruikersnaam, $wachtwoord);
}
?>

<body>
    <div class="container">
        <form class="mt-5" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Gebruikersnaam</label>
                <input type="text" name="gebruikersnaam" class="form-control" id="exampleInputEmail1"
                    aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">Voer hier uw gebruikersnaam in</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Wachtwoord</label>
                <input type="password" name="wachtwoord" class="form-control" id="exampleInputPassword1">
                <div id="emailHelp" class="form-text">Voer hier uw wachtwoord</div>
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-primary">Inloggen</button>
            </div>
        </form>
    </div>
</body>

</html>