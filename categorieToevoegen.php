<?php
session_start();

include "./includes/autoload.inc.php";
include "./templates/header.php";

if (isset($_POST['submit'])) {
    $categorie = new Beheerder;

    $categorienaam = $_POST['categorienaam'];

    $categorie->createCategorie($categorienaam);
}
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
        <form class="row g-3 mt-5" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Categorienaam</label>
                <input type="text" name="categorienaam" class="form-control" id="categorienaam" value="<?php echo $_POST['categorienaam'] ?? '' ?>">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>