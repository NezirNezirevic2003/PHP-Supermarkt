<?php
session_start();

include './includes/autoload.inc.php';
require_once './templates/header.php';

$klanten = new Beheerder;
$klant = $klanten->editKlant($_GET['klantid']);

$klantid = $klant['klantid'];
$voornaam = $klant['voornaam'];
$achternaam = $klant['achternaam'];
$email = $klant['email'];
$wachtwoord = $klant['wachtwoord'];
$adres = $klant['adres'];
$plaats = $klant['plaats'];
$zip = $klant['zip'];
?>

<div class="container">
    <form class="row g-3 mt-5" action="klant.process.php?klantid=<?= $klantid; ?>" method="POST">
        <div class="col-md-6 mt-3">
            <label for="inputEmail4" class="form-label">Nieuwe Voornaam</label>
            <input type="text" name="voornaam" class="form-control" id="voornaam" value="<?= $voornaam; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="inputPassword4" class="form-label">Nieuwe Achternaam</label>
            <input type="text" name="achternaam" class="form-control" id="achternaam" value="<?= $achternaam; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Nieuwe E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="<?= $email; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress" class="form-label">Nieuwe Wachtwoord</label>
            <input type="password" name="wachtwoord" class="form-control" id="wachtwoord" value="<?= $wachtwoord; ?>">
        </div>
        <div class="col-12 mt-3">
            <label for="inputAddress2" class="form-label">Nieuwe Adres</label>
            <input type="text" name="adres" class="form-control" id="adres" value="<?= $adres; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="inputCity" class="form-label">Nieuwe Plaats</label>
            <input type="text" name="plaats" class="form-control" id="plaats" value="<?= $plaats; ?>">
        </div>
        <div class="col-md-6 mt-3">
            <label for="inputZip" class="form-label">Nieuwe Zip</label>
            <input type="text" name="zip" class="form-control" id="zip" value="<?= $zip; ?>">
        </div>
        <div class="col-12 mt-3">
            <button type="submit" name="update" class="btn btn-success">Wijzigen</button>
        </div>
    </form>
</div>