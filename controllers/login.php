<?php
require_once '../models/members.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;

    if (isset($getvars["action"]) && $getvars["action"] == 'login') {
        $model = new MembersModel();
        $validLogin = $model->validate_login($_POST["email"], $_POST["password"]);
        
        echo '<p>' . $validLogin . '</p>';

        if ($validLogin) {
            header ('Location: inventory_list.php');           
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["member_id"] = $validLogin["member_id"];
        } else {
            $message = "Entered email and/or password is invalid";
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET["action"]) && $_GET["action"] == 'logout') {
        $isUnset = session_unset();
        $isDestroyed = session_destroy();

        if (!($isUnset && $isDestroyed)) {
            echo 'There was an error logging you out!';
        }
    }
}

include_once '../views/login_view.php';
?>