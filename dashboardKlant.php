<?php
session_start();

include "./includes/autoload.inc.php";
require_once "./includes/auth.check.klant.php";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
        integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
        crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div style="margin-top: 50px" class="jumbotron">
            <h1 class="display-4">Welkom bij uw dashboard</h1>
            <p class="lead">Dit is een beheerdashboard van de klant</p>
            <hr class="my-4">
            <p>U kunt hier uw bestellingen bekijken of uw wachtwoord wijzigen</p>
            <p class="lead">
            </p>
            <a style="margin-top: 20px;" href="categorieToevoegen.php" class="btn btn-primary" role="button"><i
                    style="margin-right: 4px" class="fas fa-pen"></i>Wachtwoord wijzigen</a>
        </div>
    </div>
    <div class="container">
        <div style="margin-top: 20px">
            <h3>Uw Bestellingen</h3>
            <hr class="my-4">
            </p>
        </div>
    </div>
    <div class="container">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th scope="col">Bestellingnr</th>
                    <th scope="col">Productnaam</th>
                    <th scope="col">Productomschrijving</th>
                    <th scope="col">Productprijs</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                $bestellingen = new Beheerder();
                foreach ($bestellingen->getBestellingen() as $bestelling) { ?>
                <tr>
                    <td><?php echo $bestelling['bestellingnr']; ?></td>
                    <td><?php echo $bestelling['productnaam']; ?></td>
                    <td><?php echo $bestelling['productomschrijving']; ?></td>
                    <td>€ <?php echo $bestelling['productprijs']; ?></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
</body>

</html>