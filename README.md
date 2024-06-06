# Easy Template Builder

## 🔫 How to start localy

Make sure Docker is installed on your local machine and run

```Shell
docker compose up
```

Then start the site on your browser using localhost:PORT . The port will be generated automatically by docker. If you have trouble to find which port is in use, run the following :

```Shell
docker ps
```

It should return something like this :

```
CONTAINER ID   IMAGE        COMMAND                  CREATED        STATUS              PORTS                   NAMES
480ea31aeef5   php:apache   "docker-php-entrypoi…"   25 hours ago   Up About a minute   0.0.0.0:52183->80/tcp   public-php-1
```
In this case, you should run the site on port 52183 (http://localhost:52183 or 0.0.0.0:52183) 

## 🌱 Build with ETB

Easy Template Builder (ETB) is an easy directory based website builder.

To create a new page : 

1. Create a directory or a subdirector at the website root (ex : /foo, /foo/bar ...). Add an index.php file in it.
2. Create a HTML file onto the /pages directory
3. Add the following onto the index.php file you've created before

```PHP
<?php

require_once("../autoload.php"); // The path should be relative. If you are in a subdirectory, you should add more ../

use App\Page;

$page = new Page([
    "title" => "My page title"
]);

$page->setContentFromFile("../pages/foo.html")->render(); // The path to the html file should be relative.
```

## 🌳 Publish

Simply copy all files contained in the root directory onto your webserver. You can re-name _htaccess to .htaccess to unable dynamic redirection to https.
