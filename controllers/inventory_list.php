<?php
require_once '../models/inventory.php';

$model = new InventoryModel();

$model->getItems();

$items = $model->items;

include_once '../views/inventory_view.php';
?>