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
    include "./includes/autoload.inc.php";
    include "./templates/header.php";

    $dbh = new PDO("mysql:host=localhost;dbname=supermarkt", "root", "");
    if (isset($_POST['submit'])) {
        $name = $_FILES['productafbeelding']['name'];
        $type = $_FILES['productafbeelding']['type'];
        $data = file_get_contents($_FILES['productafbeelding']['tmp_name']);
        $stmt = $dbh->prepare("INSERT INTO product VALUES('',?,?,?)");
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $data);
        $stmt->execute();
    }
    ?>
    <div class="container">
        <form class="row g-3 mt-5" enctype="multipart/form-data" method="POST">
            <div class="mt-3">
                <input type="file" name="productafbeelding" id="productafbeelding">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" name="submit" class="btn btn-success">Toevoegen</button>
            </div>
        </form>
    </div>
</body>

</html>