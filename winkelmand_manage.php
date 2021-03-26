<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['toevoegen'])) {
        if (isset($_SESSION['product'])) {
            $producten = array_column($_SESSION['product'], 'productnaam');

            if (in_array($_POST['productnaam'], $producten)) {
                header('location: index.php');
            } else {
                $count = count($_SESSION['product']);
                $_SESSION['product'][$count] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
                header('location: index.php');
            }
        } else {
            $_SESSION['product'][0] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
            header('location: index.php');
        }
    }
    if (isset($_POST['verwijder'])) {
        foreach ($_SESSION['product'] as $key => $value) {
            if ($value['productnaam'] == $_POST['productnaam']) {
                unset($_SESSION['product'][$key]);
                $_SESSION['product'] = array_values($_SESSION['product']);
                header('location: winkelmand.php');
            }
        }
    }
}