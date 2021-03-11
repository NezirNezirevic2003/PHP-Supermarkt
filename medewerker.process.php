<?php
include './includes/autoload.inc.php';
$medewerker = new Beheerder;

if (isset($_POST['update'])) {
    $medewerkerid = $_GET['medewerkerid'];
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $functie = $_POST['functie'];
    $salaris = $_POST['salaris'];

    $medewerker->updateMedewerker($voornaam, $achternaam, $functie, $salaris, $medewerkerid);
} else if ($_GET['send'] === 'del') {
    $medewerkerid = $_GET['medewerkerid'];
    $medewerker->deleteMedewerker($medewerkerid);
}