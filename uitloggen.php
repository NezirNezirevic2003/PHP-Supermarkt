<?php
session_start();
?>
<?php
if (isset($_SESSION['voornaam'])) {
    unset($_SESSION['voornaam']);
    header('location: index.php');
} elseif (isset($_SESSION['gebruikersnaam'])) {
    unset($_SESSION['gebruikersnaam']);
    header('location: index.php');
}
?>