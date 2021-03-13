<?php
include "./includes/autoload.inc.php";
include "./templates/header.php";

if (isset($_POST['submit'])) {
    $medewerker = new Beheerder;

    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $functie = $_POST['functie'];
    $salaris = $_POST['salaris'];
    $medewerkerid = $_POST['medewerkerid'];

    $medewerker->createMedewerker($voornaam, $achternaam, $functie, $salaris, $medewerkerid);
}
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
    <div class="container">
        <form class="row g-3 mt-5" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Voornaam</label>
                <input type="text" name="voornaam" class="form-control" id="voornaam" value="<?php echo $_POST['voornaam'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Achternaam</label>
                <input type="text" name="achternaam" class="form-control" id="achternaam" value="<?php echo $_POST['achternaam'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Functie</label>
                <input type="text" name="functie" class="form-control" id="functie" value="<?php echo $_POST['functie'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Salaris</label>
                <input type="text" name="salaris" class="form-control" id="salaris" value="<?php echo $_POST['salaris'] ?? '' ?>">
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>