<?php
require_once '../models/members.php';
require_once '../models/inventory.php';
require_once '../models/transactions.php';

if(isset($_GET["itemId"])) {
    $member_model = new MembersModel();
    $inventory_model = new InventoryModel();

    $borrower_info = "";

    $item_id = $_GET["itemId"];

    $item = $inventory_model->getItem($item_id);
    $owner = $member_model->getMember($item["fk_owner_id"]);

    if(!is_null($item["img_path"])) {
        $image = '<img class="item-image" src="../images/' . $item["img_path"] . '" />';
    }

    if($item["isAvailable"] == 0) {
        $transaction_model = new TransactionsModel();
        $transaction = $transaction_model->getTransactionByItemId($item["item_id"]);

        $borrower = $member_model->getMember($transaction["fk_borrower_id"]);

        $borrower_name = '<p>Current Borrower\'s Name: ' . $borrower["name"] . "</p>";
    }
} else {
    header ('Location: inventory_list.php');
}

include_once '../views/item_details_view.php';
?>