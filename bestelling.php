<?php
session_start();

include "./includes/autoload.inc.php";
require_once "./includes/auth.check.klant.php";
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
            <h3>Bestelling</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <h3>Bonnummer: <?php if (isset($_SESSION['bestelling'])) {
                            echo (rand(10, 4000000000));
                        } ?></h3>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th class="text-center" scope="col">Productnaam</th>
                    <th class="text-center" scope="col">Productomschrijving</th>
                    <th class="text-center" scope="col">Productprijs</th>
                    <th class="text-center" scope="col">Aantaal</th>
                    <th class="text-center" scope="col">Totaal</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $total = 0;
                if (isset($_SESSION['bestelling'])) {
                    foreach ($_SESSION['bestelling'] as $key => $value) { ?>
                <?php $total = $total + intval($value['productprijs']); ?>
                <tr>
                    <td class="text-center"><?php echo $value['productnaam']; ?></td>
                    <td class="text-center"><?php echo $value['productomschrijving']; ?></td>
                    <td class="text-center">€ <?php echo $value['productprijs']; ?></td>
                    <td class="text-center"><?php echo $value['Quantity']; ?></td>
                    <td class="text-center">€ <?php echo $total ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
        <?php
        if (isset($_POST['submit'])) {

            $beheerder = new Beheerder();
            $besteldatum = $_POST['besteldatum'];
            $productnaam = $_POST['productnaam'];
            $productomschrijving = $_POST['productomschrijving'];
            $productprijs = $_POST['productprijs'];

            $beheerder->createBestelling($besteldatum, $productnaam, $productomschrijving, $productprijs);
        }

        ?>
        <form action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <input type="hidden" name="besteldatum" value="<?php echo date("d.m.Y"); ?>">
            <input type="hidden" name="productnaam" value="<?php echo $value['productnaam']; ?>">
            <input type="hidden" name="productomschrijving" value="<?php echo $value['productomschrijving']; ?>">
            <input type="hidden" name="productprijs" value="<?php echo $value['productprijs']; ?>">
            <input type="hidden" name="aantaal" value="<?php echo $value['Quantity']; ?>">
            <button class="btn btn-success btn-block" name="submit" type="submit">Bestellen</button>
        </form>
</body>

</html>