<?php

require_once("../../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Prestations / Nettoyage général"
]);

$page->setContentFromFile("../../pages/prestations/nettoyage.html")->render();