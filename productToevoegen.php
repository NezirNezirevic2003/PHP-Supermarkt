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
    session_start();

    include "./includes/autoload.inc.php";
    require_once "./includes/auth.check.beheerder.php";
    require_once "./classes/product.validator.class.php";
    include "./templates/header.php";

    $dbh = new PDO("mysql:host=localhost;dbname=supermarkt", "root", "");
    if (isset($_POST['submit'])) {
        $validation = new ProductValidator($_POST);
        $errors = $validation->validateForm();

        if (!$errors) {
            $name = $_FILES['productafbeelding']['name'];
            $type = $_FILES['productafbeelding']['type'];
            $data = file_get_contents($_FILES['productafbeelding']['tmp_name']);
            $productnaam = $_POST['productnaam'];
            $productomschrijving = $_POST['productomschrijving'];
            $categorie = $_POST['categorie'];
            $productprijs = $_POST['productprijs'];
            $stmt = $dbh->prepare("INSERT INTO product VALUES('',?,?,?,?,?,?,?)");
            $stmt->bindParam(1, $name);
            $stmt->bindParam(2, $type);
            $stmt->bindParam(3, $data);
            $stmt->bindParam(4, $productnaam);
            $stmt->bindParam(5, $productomschrijving);
            $stmt->bindParam(6, $categorie);
            $stmt->bindParam(7, $productprijs);
            $stmt->execute();
        }
    }
    ?>
    <div class="container">
        <form class="row g-3 mt-5" enctype="multipart/form-data" method="POST">
            <div class="form-group ml-3">
                <label for="exampleFormControlFile1">Kies een foto</label>
                <input type="file" name="productafbeelding" class="form-control-file" id="exampleFormControlFile1">
            </div>
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Productnaam</label>
                <input type="text" name="productnaam" class="form-control" id="productnaam">
                <div class="error">
                    <?php echo $errors['productnaam'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <label for="exampleFormControlTextarea1">Productomschrijving</label>
                <textarea class="form-control" name="productomschrijving" id="exampleFormControlTextarea1" rows="3"
                    width="50px"></textarea>
                <div class="error">
                    <?php echo $errors['productomschrijving'] ?? '' ?>
                </div>
            </div>
            <select name="categorie" class="form-select form-select-lg mb-3 ml-3 mt-3" style="width: max-content;"
                aria-label=".form-select-lg example">
                <option selected>Kies bij welke categorie dit product hoort</option>
                <option value="Groenten, fruit">Groenten, fruit</option>
                <option value="Vlees, kip en vis">Vlees, kip en vis</option>
                <div class="error">
                    <?php echo $errors['categorie'] ?? '' ?>
                </div>
            </select>
            <div class="col-12 mt-3">
                <label for="inputAddress" class="form-label">Productprijs</label>
                <input type="text" name="productprijs" class="form-control" id="productprijs">
                <div class="error">
                    <?php echo $errors['productprijs'] ?? '' ?>
                </div>
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>