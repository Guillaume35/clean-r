<?php

session_start();

if (isset($_POST["send"])) {
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["mail"] = $_POST["mail"];
    $_SESSION["phone"] = $_POST["phone"];
    $_SESSION["message"] = $_POST["message"];
    $_SESSION["society"] = $_POST["society"];
}

if (isset($_POST["confirm"])) {
    if ($_POST["mail"] !== $_SESSION["mail"]) {
        echo "ER : Mail diff mail";
        die();
    }

    if ($_POST["phone"] !== $_SESSION["phone"]) {
        echo "ER : Phone diff phone";
        die();
    }
}

require_once("../../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Contact"
]);

$page->setContentFromFile("../../pages/contact/send.html")->render();