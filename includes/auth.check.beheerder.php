<?php
if (!isset($_SESSION['gebruikersnaam'])) {
    header('location: beheerder.php');
}