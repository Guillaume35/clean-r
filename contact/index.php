<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Contact"
]);

$page->setContentFromFile("../pages/contact/form.html")->render();