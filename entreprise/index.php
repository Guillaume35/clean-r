<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Entreprise"
]);

$page->setContentFromFile("../pages/entreprise.html")->render();