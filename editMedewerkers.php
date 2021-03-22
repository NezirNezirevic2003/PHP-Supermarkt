<?php
session_start();

include './includes/autoload.inc.php';
require_once "./includes/auth.check.beheerder.php";
require_once './templates/header.php';

$medewerkers = new Beheerder;
$medewerker = $medewerkers->editMedewerker($_GET['medewerkerid']);

$medewerkerid = $medewerker['medewerkerid'];
$voornaam = $medewerker['voornaam'];
$achternaam = $medewerker['achternaam'];
$functie = $medewerker['functie'];
$salaris = $medewerker['salaris'];
?>

<div class="container">
    <form class="row g-3 mt-5" action="medewerker.process.php?medewerkerid=<?= $medewerkerid; ?>" method="POST">
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Voornaam</label>
            <input type="text" name="voornaam" class="form-control" id="voornaam" value="<?= $voornaam; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Achternaam</label>
            <input type="text" name="achternaam" class="form-control" id="achternaam" value="<?= $achternaam; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Functie</label>
            <input type="text" name="functie" class="form-control" id="functie" value="<?= $functie; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Salaris</label>
            <input type="text" name="salaris" class="form-control" id="salaris" value="<?= $salaris; ?>">
        </div>
        <div class="col-12 mt-3">
            <button type="submit" name="update" class="btn btn-primary">Wijzigen</button>
        </div>
    </form>
</div>