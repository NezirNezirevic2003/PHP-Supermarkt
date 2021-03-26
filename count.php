<?php
$count = 0;
if (isset($_SESSION['product'])) {
    $count = count($_SESSION['product']);
}