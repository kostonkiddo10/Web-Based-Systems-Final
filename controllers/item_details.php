<?php
require_once '../models/members.php';
require_once '../models/inventory.php';
require_once '../models/transactions.php';

if(isset($_GET["itemId"])) {
    $member_model = new MembersModel();
    $inventory_model = new InventoryModel();
    $transaction_model = new TransactionsModel();
    $item_id = $_GET["itemId"];

    $item = $inventory_model->getItem($item_id);
    $owner = $member_model->getMember($item["fk_owner_id"]);
} else {
    header ('Location: inventory_list.php');
}

include_once '../views/item_details_view.php';
?>