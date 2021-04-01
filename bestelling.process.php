<?php
include './includes/autoload.inc.php';
$bestelling = new Beheerder;

if (isset($_POST['submit'])) {
} else if ($_GET['send'] === 'del') {
    $bestellingr = $_GET['bestellingnr'];
    $bestelling->deleteBestelling($bestellingr);
}