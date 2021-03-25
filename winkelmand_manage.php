<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['toevoegen'])) {
        if (isset($_SESSION['product'])) {
            $producten = array_column($_SESSION['product'], 'productnaam');

            if (in_array($_POST['productnaam'], $producten)) {
                echo "<script>alert('Product is al toegevoegd');
                window.location.href='index.php';
                </script>";
            } else {
                $count = count($_SESSION['product']);
                $_SESSION['product'][$count] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
                echo "<script>alert('Product is succesvol toegevoegd');
            window.location.href='index.php';
            </script>";
            }
        } else {
            $_SESSION['product'][0] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
            echo "<script>alert('Product is succesvol toegevoegd');
            window.location.href='index.php';
            </script>";
        }
    }
}