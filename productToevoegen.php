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
    include_once 'database.php';
    if (isset($_POST['upload'])) {

        $file = rand(1000, 100000) . "-" . $_FILES['file']['name'];
        $file_loc = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_type = $_FILES['file']['type'];
        $folder = "upload/";

        $new_size = $file_size / 1024;

        $new_file_name = strtolower($file);

        $final_file = str_replace(' ', '-', $new_file_name);

        if (move_uploaded_file($file_loc, $folder . $final_file)) {
            $sql = "INSERT INTO image(file,type,size) VALUES('$final_file','$file_type','$new_size')";
            mysqli_query($conn, $sql);


            echo "File sucessfully upload";
        } else {

            echo "Error.Please try again";
        }
    }
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