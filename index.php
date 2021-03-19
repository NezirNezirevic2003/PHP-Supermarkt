<?php
include "./templates/header.php";
include "./classes/dbh.class.php";
include "./includes/autoload.inc.php";

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
    <div class="container mb-4">
        <div class="row">
            <div class="col-md">
                <div class="card mt-4" style="width: 15rem;">
                    <?php
                    $producten = new Beheerder();
                    foreach ($producten->getProducten() as $product) { ?>
                    <?php echo "<img class='card-img-top src='embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='100'"; ?>
                    <-->
                        <h5 class="card-title"><?php echo $product['productnaam']; ?></h5>
                        <p class="card-text"><?php echo $product['productomschrijving'] ?></p>
                        <a href="#" class="btn btn-primary">€ <?php echo $product['productprijs']; ?></a>
                        <?php
                    }
                        ?>

                </div>
            </div>
            <div class="col-md">
                <div class="card mt-4" style="width: 15rem;">
                    <?php
                    $producten = new Beheerder();
                    foreach ($producten->getProducten() as $product) { ?>
                    <?php echo "<embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='100'"; ?>
                    <-->
                        <h5 class="card-title"><?php echo $product['productnaam']; ?></h5>
                        <p class="card-text"><?php echo $product['productomschrijving'] ?></p>
                        <a href="#" class="btn btn-primary">€ <?php echo $product['productprijs']; ?></a>
                        <?php
                    }
                        ?>

                </div>
            </div>
            <div class="col-md ml-5">
                <div class="card mt-4" style="width: 15rem;">
                    <?php
                    $producten = new Beheerder();
                    foreach ($producten->getProducten() as $product) { ?>
                    <?php echo "<embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='100'"; ?>

                    <-->
                        <h5 class="card-title"><?php echo $product['productnaam']; ?></h5>
                        <p class="card-text"><?php echo $product['productomschrijving'] ?></p>
                        <a href="#" class="btn btn-primary">€ <?php echo $product['productprijs']; ?></a>
                        <?php
                    }
                        ?>

                </div>
            </div>
        </div>
    </div>



</body>

</html>