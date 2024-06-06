<?php

require_once("../autoload.php");

use App\Page;

$page = new Page([
    "title" => "Partenaires"
]);

$page->setContentFromFile("../pages/partenaires.html")->render();