<?php
include './includes/autoload.inc.php';
$klant = new Klant;

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
}