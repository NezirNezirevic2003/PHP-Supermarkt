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
                            <th scope="col">Totaal</th>
                            <th scope="col">Verwijder</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['product'])) {
                            foreach ($_SESSION['product'] as $key => $value) {
                                $total = $total + intval($value['productprijs']);
                                echo
                                "<tr>
                    <td>$value[productnaam]</td>
                    <td>$value[productomschrijving]</td>
                    <td>€ $value[productprijs]</td>
                    <td><input class='text-center' type='number' value='$value[Quantity]' min='1' max='10'></td>
                    <td class='itotal'></td>
                    <td>
                    <form action='winkelmand_manage.php' method='POST'>
                    <button name='verwijder' class='btn btn-danger'><i class='fas fa-trash'></i></button>
                    <input type='hidden' name='productnaam' value='$value[productnaam]'>
                    </form>
                    </td>
                    </tr>";
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
                        foreach ($_SESSION['product'] as $key => $value) {
                            echo "<h6 class='text-center' style='margin-top: 20px;'>$value[productnaam] € $value[productprijs]</h6>";
                        }
                        echo "<hr class='my-4'>
                    <h3 class='text-center'>Totaal: € $total</h3>
                    <form action=''>
                    <a href='' class='btn btn-primary btn-block' role='button'><i style='margin-right: 4px'
                    class='far fa-credit-card'></i>Bestellen</a>
                    <input type='hidden' name='productnaam' value='$value[productnaam]'>
                    <input type='hidden' name='productnaam' value='$value[productomschrijving]'>
                    <input type='hidden' name='productnaam' value='$value[productprijs]'>
                    </form>";
                    }
                    ?>

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