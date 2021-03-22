<?php
include './includes/autoload.inc.php';
$product = new Beheerder;

if (isset($_POST['update'])) {
} else if ($_GET['send'] === 'del') {
    $artikelnr = $_GET['artikelnr'];
    $product->deleteProduct($artikelnr);
}