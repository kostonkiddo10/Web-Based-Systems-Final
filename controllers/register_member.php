<?php
require_once '../models/members.php';

$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $getvars = $_GET;
    if (isset($getvars["action"]) && $getvars["action"] == 'add') {
        $members = new MembersModel();

        $name = $_POST['first_name'] . " " . $_POST['last_name'];
        $email = $_POST['email'];
        $pass = $_POST['passwrd'];

        $result = $members->addMember($name, $email, $pass);

        if ($result) {
            $message = "Welcome to the club, " . $name . "!";
        } else {
            $message = "Failed";
        }
    }
} 

include_once '../views/register_member_view.php';
?>