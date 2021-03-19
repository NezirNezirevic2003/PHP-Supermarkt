<?php
include './includes/autoload.inc.php';
$categorie = new Beheerder;

if (isset($_POST['update'])) {
    $categorieid = $_GET['categorieid'];
    $categorienaam = $_POST['categorienaam'];


    $categorie->updateCategorie($categorienaam, $categorieid);
} else if ($_GET['send'] === 'del') {
    $categorieid = $_GET['categorieid'];
    $categorie->deleteCategorie($categorieid);
}