<?php

require_once("../../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Prestations / Trappes de visites"
]);

$page->setContentFromFile("../../pages/prestations/trappes-visites.html")->render();