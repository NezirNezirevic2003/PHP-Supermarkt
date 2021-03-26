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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
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
        <div style="margin-top: 20px">
            <h3>Zoekresultaten</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <div class="card mt-4" style="width: 22rem;">
            <form action="winkelmand_manage.php" method="POST">
                <div class="card-body">
                    <img><?php echo "<img class='card-img-top src='embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='220'"; ?></img>
                    <h5 class="card-title" name="productnaam">
                        <?php echo $product['productnaam']; ?>
                    </h5>
                    <p class="card-text" name="productomschrijving">
                        <?php echo $product['productomschrijving']; ?></p>
                    <a href="#" class="btn btn-primary" name="productprijs">€
                        <?php echo $product['productprijs']; ?></a>
                    <button class="btn btn-success" name="toevoegen" type="submit"><a><i style="color: white;"
                                class="fas fa-shopping-cart"></i></a></button>
                    <input type="hidden" name="artkelnr" value="<?php echo $product['artikelnr'] ?>">
                    <input type="hidden" name="productnaam" value="<?php echo $product['productnaam'] ?>">
                    <input type="hidden" name="productomschrijving"
                        value="<?php echo $product['productomschrijving'] ?>">
                    <input type="hidden" name="productprijs" value="<?php echo $product['productprijs'] ?>">
                </div>
            </form>
        </div>
    </div>
    <?php
        }
    }
    ?>
    </div>
</body>

</html>