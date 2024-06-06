<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Réalisations"
]);

$page->setContentFromFile("../pages/realisations.html")->render();