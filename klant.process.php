<?php
include './includes/autoload.inc.php';
$klant = new Beheerder;

if (isset($_POST['update'])) {
    $klantid = $_GET['klantid'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];
    $adres = $_POST['adres'];
    $plaats = $_POST['plaats'];
    $zip = $_POST['zip'];

    $klant->updateKlant($voornaam, $achternaam, $email, $wachtwoord, $adres, $plaats, $zip, $klantid);
} else if ($_GET['send'] === 'del') {
    $klantid = $_GET['klantid'];
    $klant->deleteKlant($klantid);
}
