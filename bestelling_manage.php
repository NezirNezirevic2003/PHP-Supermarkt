<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bestellen'])) {
        if (isset($_SESSION['bestelling'])) {
            $bestelling = array_column($_SESSION['bestelling'], 'productnaam');
            if (in_array($_POST['productnaam'], $bestelling)) {
                header("location:" . $_SERVER['HTTP_REFERER']);
            }

            $count = count($_SESSION['bestelling']);
            $_SESSION['bestelling'][$count] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
            print_r($_SESSION['bestelling']);
        } else {
            $_SESSION['bestelling'][0] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => 1);
            print_r($_SESSION['bestelling']);
        }
    }
}