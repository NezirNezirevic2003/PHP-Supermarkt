<?php
session_start();
include "./includes/autoload.inc.php";
include "./classes/dbh.class.php";
include "./templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div style="margin-top: 20px">
            <h3>Producten</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
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
</body>

</html>