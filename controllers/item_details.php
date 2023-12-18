<?php
require_once '../models/members.php';
require_once '../models/inventory.php';
require_once '../models/transactions.php';

session_start();

if ($_SESSION["isLoggedIn"]) {
    if (isset($_GET["itemId"])) {
        $member_model = new MembersModel();
        $inventory_model = new InventoryModel();
        $transaction_model = new TransactionsModel();
        $owner_options = "";
        $borrower_options = "";

        $borrower_info = "";

        $item_id = $_GET["itemId"];

        $item = $inventory_model->getItem($item_id);
        $owner = $member_model->getMember($item["fk_owner_id"]);

        if(!is_null($item["img_path"])) {
            $image = '<img class="item-image" src="../images/' . $item["img_path"] . '" />';
        }

        if($item["isAvailable"] == 0) {
            $transaction = $transaction_model->getMostRecentTransactionByItemId($item["item_id"]);

            $borrower = $member_model->getMember($transaction["fk_borrower_id"]) ?? 'ERROR';

            $borrower_name = '<p>Current Borrower\'s Name: ' . $borrower["name"] ?? 'ERROR' . "</p>";

            if($owner["member_id"] == $_SESSION["member_id"]) {
                $owner_options = '<form method="post"><input type="submit" name="itemReturned" value="Mark As Returned"></input></form>';
                if (array_key_exists('itemReturned', $_POST)) {
                    $inventory_model->returnItem($item["item_id"]);
                    Header('Location: '.$_SERVER['PHP_SELF'].'?itemId='.$item["item_id"]);
                }
                
            }
        } else {
            if (!($owner["member_id"] == $_SESSION["member_id"])) {
                $borrower_options = '<form method="post"><input type="submit" name="borrowItem" value="Borrow Item"></input></form>';

                if (array_key_exists('borrowItem', $_POST)) {
                    $inventory_model->borrowItem($item["item_id"]);
                    $transaction_model->newTransaction($item["item_id"], $_SESSION["member_id"]);
                    Header('Location: '.$_SERVER['PHP_SELF'].'?itemId='.$item["item_id"]);
                }
            }
        }
    } else {
        header ('Location: inventory_list.php');
    }
} else {
    header ('Location: login.php');
}

include_once '../views/item_details_view.php';
?>