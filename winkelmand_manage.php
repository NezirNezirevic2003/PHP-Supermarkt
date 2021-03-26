<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['toevoegen'])) {
        if (isset($_SESSION['product'])) {
            $producten = array_column($_SESSION['product'], 'productnaam');

            if (in_array($_POST['productnaam'], $producten)) {
                echo "<script>alert('Product is al toegevoegd');
                window.location.href='winkelmand.php';
                </script>";
            } else {
                $count = count($_SESSION['product']);
                $_SESSION['product'][$count] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
                echo "<script>alert('Product is succesvol toegevoegd');
            window.location.href='winkelmand.php';
            </script>";
            }
        } else {
            $_SESSION['product'][0] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
            echo "<script>alert('Product is succesvol toegevoegd');
            window.location.href='winkelmand.php';
            </script>";
        }
    }
    if (isset($_POST['verwijder'])) {
        foreach ($_SESSION['product'] as $key => $value) {
            if ($value['productnaam'] == $_POST['productnaam']) {
                unset($_SESSION['product'][$key]);
                $_SESSION['product'] = array_values($_SESSION['product']);
                echo "<script>alert('Product is verwijderd');
                window.location.href='winkelmand.php';
                </script>";
            }
        }
    }
}