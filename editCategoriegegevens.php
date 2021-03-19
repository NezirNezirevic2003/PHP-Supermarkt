<?php
include "./includes/autoload.inc.php";
include "./templates/header.php";

$categorieen = new Beheerder;
$categorie = $categorieen->editCategorie($_GET['categorieid']);

$categorieid = $categorie['categorieid'];
$categorienaam = $categorie['categorienaam'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <form class="row g-3 mt-5" action="categorie.process.php?categorieid=<?= $categorieid; ?>" method="POST">
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Categorienaam</label>
                <input type="text" name="categorienaam" class="form-control" id="categorienaam"
                    value="<?= $categorienaam; ?>">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="update" class="btn btn-success">Wijzigen</button>
            </div>
        </form>
    </div>
</body>

</html>