<?php
include './includes/autoload.inc.php';
$product = new Beheerder;

if (isset($_POST['submit'])) {
    $artikelnr = $_GET['artikelnr'];
    $productnaam = $_POST['productnaam'];
    $productomschrijving = $_POST['productomschrijving'];
    $productprijs = $_POST['productprijs'];

    $product->updateProduct($productnaam, $productomschrijving, $productprijs, $artikelnr);
} else if ($_GET['send'] === 'del') {
    $artikelnr = $_GET['artikelnr'];
    $product->deleteProduct($artikelnr);
}