<?php
session_start();

include "./includes/autoload.inc.php";
include "./templates/header.php";
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
        <form class="row g-3 mt-5" action="productZoeken.php" method="POST">
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Typ uw productnaam</label>
                <input type="text" name="productzoekvak" class="form-control" id="productzoekvak"
                    placeholder="Zoeken..">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Zoeken</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $productnaam = $_POST['productzoekvak'];

        $producten = new Beheerder();
        foreach ($producten->zoekProduct($productnaam) as $product) { ?>
    <div class="container">
        <div class="card mt-4" style="width: 22rem;">
            <div class="card-body">
                <img><?php echo "<img class='card-img-top src='embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='220'"; ?></img>
                <h5 class="card-title"><?php echo $product['productnaam']; ?></h5>
                <p class="card-text"><?php echo $product['productomschrijving']; ?></p>
                <a href="#" class="btn btn-primary">€ <?php echo $product['productprijs']; ?></a>
            </div>
        </div>
    </div>


    <?php
        }
    }
    ?>

    </div>
</body>

</html>