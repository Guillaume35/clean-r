<?php

require_once("../autoload.php");

use App\Page;

session_start();

$fields = ["name", "society", "mail", "phone", "subject", "message"];
$form_content = [];

foreach ($fields as $field) {
    $form_content[$field] = $_SESSION[$field] ?? "";
}

$page = new Page([
    "title" => "Contact",
    "variables" => $form_content
]);

$page->setContentFromFile("../pages/contact/form.html")->render();