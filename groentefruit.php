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
        <div style="margin-top: 20px">
            <h3>Groenten, fruit</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            $categorie = "Groenten, fruit";
                            $producten = new Beheerder();
                            foreach ($producten->getCategorie1($categorie) as $product) { ?>
                            <div class="col-md-4 mt-1">
                                <form action="winkelmand_manage.php" method="POST">
                                    <div class="card-body"
                                        style="border: 1px solid rgba(0,0,0,.125); margin-bottom: 30px; border-radius: .25rem">
                                        <img><?php echo "<img class='card-img-top src='embed src='data:" . $product['mime'] . ";base64," . base64_encode($product['data']) . "'width='200' height='220'"; ?></img>
                                        <h5 class="card-title" name="productnaam">
                                            <?php echo $product['productnaam']; ?>
                                        </h5>
                                        <p class="card-text" name="productomschrijving">
                                            <?php echo $product['productomschrijving']; ?></p>
                                        <p class="card-text" name='productprijs'>€
                                            <?php echo $product['productprijs']; ?>
                                        </p>
                                        <button class="btn btn-success btn-block" name="toevoegen" type="submit"><a><i
                                                    style="color: white;"
                                                    class="fas fa-cart-plus fa-1x"></i></a></button>
                                        <input type="hidden" name="productnaam"
                                            value="<?php echo $product['productnaam'] ?>">
                                        <input type="hidden" name="productomschrijving"
                                            value="<?php echo $product['productomschrijving'] ?>">
                                        <input type="hidden" name="productprijs"
                                            value="<?php echo $product['productprijs'] ?>">
                                    </div>
                                </form>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>