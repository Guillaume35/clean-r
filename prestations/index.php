<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Prestations"
]);

$page->setContentFromFile("../pages/prestations.html")->render();