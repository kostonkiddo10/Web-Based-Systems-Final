<?php
require_once '../models/inventory.php';

session_start();

if ($_SESSION["isLoggedIn"]) {
    $model = new InventoryModel();

    $model->getItems();

    $items = $model->items;
} else {
    header ('Location: login.php');
}

include_once '../views/inventory_view.php';
?>