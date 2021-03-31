<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['bestellen'])) {
        if (isset($_SESSION['bestelling'])) {
            // $bestelling = array_column($_SESSION['bestelling'], ['productnaam']);
        } else {
            $_SESSION['bestelling'][2] = array('productnaam' => $_POST['productnaam'], 'productomschrijving' => $_POST['productomschrijving'], 'productprijs' => $_POST['productprijs'], 'Quantity' => $_POST['Quantity']);
            print_r($_SESSION['bestelling']);
        }
    }
}