<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Mentions légales"
]);

$page->setContentFromFile("../pages/mentions-legales.html")->render();