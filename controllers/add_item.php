<?php
require_once '../models/inventory.php';

// $target_dir = "../images/";
// $target_file = $target_dir . basename($_FILES["imgUpload"]["name"]);
// $uploadOk = 1;
// $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// if(isset($_POST["addItem"])) {
//   $check = getimagesize($_FILES["imgUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//   }
// }

session_start();
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inventory_model = new InventoryModel();
    $item_name = $_POST["itemName"];

    if (strlen($_FILES["imgUpload"]["name"]) > 0) {
        $target_file = basename($_FILES["imgUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        $result = $inventory_model->addItem($item_name, $_SESSION["member_id"], $target_file);

        if ($result) {
            $message = $item_name . " added!";
            move_uploaded_file($_FILES['imgUpload']['tmp_name'], "../images/" . $target_file);
        } else {
            $message = "Failed";
        }
    } else {
        $result = $inventory_model->addItem($item_name, $_SESSION["member_id"]);

        if ($result) {
            $message = $item_name . " added!";
            move_uploaded_file($_FILES['imgUpload']['tmp_name'], "../images/" . $target_file);
        } else {
            $message = "Failed";
        }
    }
} 

include_once '../views/add_item_view.php'
?>