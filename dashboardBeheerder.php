<?php
require_once 'templates/header.php';
require_once 'templates/footer.php';
?>
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
                <p class="card-text"></p>
                <a href="klantgegevens.php" class="btn btn-success">Klantgegevens</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="card-body">
                <h5 class="card-title">Producten wijzigen, toevoegen of verwijderen</h5>
                <p class="card-text"></p>
                <a href="productgegevens.php" class="btn btn-primary">Producten</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="card-body">
                <h5 class="card-title">Medewerkers wijzigen, toevoegen of verwijderen</h5>
                <p class="card-text"></p>
                <a href="medewerkers.php" class="btn btn-secondary">Medewerkers</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="card-body">
                <h5 class="card-title">Categorien wijzigen, toevoegen of verwijderen</h5>
                <p class="card-text"></p>
                <a href="readKlant.php" class="btn btn-danger">Categorieen</a>
            </div>
        </div>
    </div>
</div>