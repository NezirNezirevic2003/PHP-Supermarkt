<?php
session_start();

include "./includes/autoload.inc.php";
require_once "./includes/auth.check.beheerder.php";
include "./templates/header.php";

$producten = new Beheerder;
$product = $producten->editProduct($_GET['artikelnr']);

$productnaam = $product['productnaam'];
$productomschrijving = $product['productomschrijving'];
$productprijs = $product['productprijs'];



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
        <form class="row g-3 mt-5" enctype="multipart/form-data" method="POST">
            <div class="form-group ml-3">
                <label for="exampleFormControlFile1">Kies een foto</label>
                <input type="file" name="productafbeelding" class="form-control-file" id="exampleFormControlFile1"
                    value="<?= $productafbeelding; ?>">
            </div>
            <div class=" col-12 mt-3">
                <label for="inputAddress" class="form-label">Productnaam</label>
                <input type="text" name="productnaam" class="form-control" id="productnaam"
                    value="<?= $productnaam; ?>">
            </div>
            <div class=" col-12 mt-3">
                <label for="exampleFormControlTextarea1">Productomschrijving</label>
                <textarea class="form-control" name="productomschrijving" id="exampleFormControlTextarea1" rows="3"
                    width="50px" value="<?= $productomschrijving; ?>"></textarea>
            </div>
            <div class=" col-12 mt-3">
                <label for="inputAddress" class="form-label">Productprijs</label>
                <input type="text" name="productprijs" class="form-control" id="productprijs"
                    value="<?= $productprijs; ?>">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>