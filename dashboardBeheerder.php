<?php
session_start();

include "./includes/autoload.inc.php";
require_once "./includes/auth.check.beheerder.php";
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
            <p class="lead">Dit is het beheersysteem van het supermarkt</p>
            <hr class="my-4">
            <p>U kunt vanaf hier producten, klanten, medewerkers en categorieen beheren</p>
            <p class="lead">
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card-body">
                    <h5 class="card-title">Klantgegevens wijzigen, toevoegen of verwijderen</h5>
                    <p class="card-text">Hier kunt u klantgegevens beheren</p>
                    <a href="klantgegevens.php" class="btn btn-success btn-block"><i style="margin-right: 4px"
                            class="fas fa-users"></i>Klantgegevens</a>
                </div>
            </div>
            <div class="col-sm">
                <div class="card-body">
                    <h5 class="card-title">Producten wijzigen,toevoegen of verwijderen</h5>
                    <p class="card-text">Hier kunt u producten beheren</p>
                    <a href="productgegevens.php" class="btn btn-primary btn-block"><i style="margin-right: 4px"
                            class="fas fa-drumstick-bite"></i>Producten</a>
                </div>
            </div>
            <div class="col-sm">
                <div class="card-body">
                    <h5 class="card-title">Medewerkers wijzigen, toevoegen of verwijderen</h5>
                    <p class="card-text">Hier kunt u medewerkers beheren</p>
                    <a href="medewerkers.php" class="btn btn-secondary btn-block"><i style="margin-right: 4px;"
                            class="fas fa-users-cog"></i>Medewerkers</a>
                </div>
            </div>
            <div class="col-sm">
                <div class="card-body">
                    <h5 class="card-title">Categorien wijzigen, toevoegen of verwijderen</h5>
                    <p class="card-text">Hier kunt u categorieen beheren</p>
                    <a href="categoriegegevens.php" class="btn btn-danger btn-block"><i style="margin-right: 4px;"
                            class="fas fa-list"></i>Categorieen</a>
                </div>
            </div>
        </div>
    </div>

</body>

</html>