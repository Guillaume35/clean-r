<?php

require_once("autoload.php");

use App\Page;

$page = new Page([
    "title" => "Accueil"
]);

$page->setContentFromFile("pages/accueil.html")->render();