<?php
session_start();
?>
<?php
if (isset($_SESSION['voornaam'])) {
    unset($_SESSION['voornaam']);
}
?>