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
            <h3>Winkelmand</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-hover">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Productnaam</th>
                            <th scope="col">Productomschrijving</th>
                            <th scope="col">Productprijs</th>
                            <th scope="col">Aantaal</th>
                            <th scope="col">Verwijder</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['product'])) {
                            foreach ($_SESSION['product'] as $key => $value) { ?>
                        <?php $total = $total + intval($value['productprijs']); ?>
                        <tr>
                            <td><?php echo $value['productnaam']; ?></td>
                            <td><?php echo $value['productomschrijving']; ?></td>
                            <td>€ <?php echo $value['productprijs']; ?></td>
                            <td><input class='text-center' type='number' value='<?php echo $value['Quantity']; ?>'
                                    min='1' max='10'></td>
                            <td>
                                <form action='winkelmand_manage.php' method='POST'>
                                    <button name='verwijder' class='btn btn-danger'><i
                                            class='fas fa-trash'></i></button>
                                    <input type='hidden' name='productnaam'
                                        value='<?php echo $value['productnaam']; ?>'>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="border bg-light rounded p-4">
                    <h4 class="text-center">Afrekenen</h4>
                    <?php
                    if (isset($_SESSION['product'])) {
                        foreach ($_SESSION['product'] as $key => $value) { ?>
                    <h6 class='text-center' style='margin-top: 20px;'>
                        <?php echo $value['productnaam']; ?> € <?php echo $value['productprijs']; ?></h6>
                    <?php
                        }
                    }
                    ?>
                    <hr class='my-4'>
                    <h3 class='text-center'>Totaal: € <?php echo $total; ?></h3>
                    <form action='bestelling_manage.php'>
                        <input type='hidden' name='productnaam' value='<?php echo $value['productnaam']; ?>'>
                        <input type='hidden' name='productomschrijving'
                            value='<?php echo $value['productomschrijving']; ?>'>
                        <input type='hidden' name='productprijs' value='<?php echo $value['productprijs']; ?>'>
                        <input type='hidden' name='aantaal' value='<?php echo $value['Quantity']; ?>'>
                        <input type='hidden' name='totaal' value='<?php echo $total ?>'>
                        <button class="btn btn-primary btn-block" name="bestellen" type="submit"><a><i
                                    style="color: white; margin-right: 4px;"
                                    class="far fa-credit-card 1x"></i>Bestellen</a></button>
                    </form>
                    <div class="mt-1">
                        <i class="fab fa-cc-visa fa-2x"></i>
                        <i class="fab fa-cc-paypal fa-2x"></i>
                        <i class="fab fa-cc-mastercard fa-2x"></i>
                        <i class="fab fa-cc-apple-pay fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>