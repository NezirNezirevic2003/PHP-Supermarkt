<?php
if(!isset($_SESSION['voornaam'])) {
    header('location: login.php');
}