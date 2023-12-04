<?php
require_once '../models/members.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;

    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $model = new MembersModel();
        $validLogin = $model->validate_login($_POST["email"], $_POST["password"]);
        
        echo '<p>' . $validLogin . '</p>';

        if ($validLogin) {
            header ('Location: inventory_list.php');
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
}

include_once '../views/login_view.php';
?>