<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include_once './classes/dbh.class.php';
    include "./includes/autoload.inc.php";
    include "./templates/header.php";
    ?>
    <div class="container">
        <form class="row g-3 mt-5" action="<?php echo $_SERVER['PHP_SELF']  ?>" method="POST">
            <div class="col-12">
                <label for="inputAddress" class="form-label">Productnaam</label>
                <input type="text" name="productnaam" class="form-control" id="productnaam" value="<?php echo $_POST['productnaam'] ?? '' ?>">
            </div>
            <div class="custom-file">
                <input type="file" name="productafbeelding" class="custom-file-input" id="productafbeelding" required value="<?php echo $_POST['productafbeelding'] ?? '' ?>">
                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Productprijs</label>
                <input type="text" name="productprijs" class="form-control" id="productprijs" value="<?php echo $_POST['productprijs'] ?? '' ?>">
            </div>
            <div class="col-12">
                <label for="inputAddress" class="form-label">Productomschrijving</label>
                <input type="text" name="productnaam" class="form-control" id="productnaam" value="<?php echo $_POST['productomschrijving'] ?? '' ?>">
            </div>
            <div class="col-12">
                <button type="submit" name="submit" class="btn btn-primary">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>