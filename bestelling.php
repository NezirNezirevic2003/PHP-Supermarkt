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
                    <th scope="col">Productnaam</th>
                    <th scope="col">Productomschrijving</th>
                    <th scope="col">Productprijs</th>
                    <th scope="col">Aantaal</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $total = 0;
                if (isset($_SESSION['bestelling'])) {
                    foreach ($_SESSION['bestelling'] as $key => $value) { ?>
                <?php $total = $total + intval($value['productprijs']); ?>
                <tr>
                    <td><?php echo $value['productnaam']; ?></td>
                    <td><?php echo $value['productomschrijving']; ?></td>
                    <td>€ <?php echo $value['productprijs']; ?></td>
                    <td><?php echo $value['Quantity']; ?></td>
                </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
</body>

</html>