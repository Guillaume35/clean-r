<?php

require_once("../../autoload.php");

use App\Page;

session_start();

if (isset($_POST["send"])) {

    $_SESSION["name"] = htmlspecialchars(substr($_POST["name"], 0, 255));
    $_SESSION["mail"] = htmlspecialchars(substr($_POST["mail"], 0, 255));
    $_SESSION["phone"] = htmlspecialchars(substr($_POST["phone"], 0, 100));
    $_SESSION["message"] = htmlspecialchars(substr($_POST["message"], 0, 5000));
    $_SESSION["society"] = htmlspecialchars(substr($_POST["society"], 0, 255));
    $_SESSION["subject"] = htmlspecialchars(substr($_POST["subject"], 0, 255));

    $errors = [];

    if (!filter_var($_SESSION["mail"], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'adresse email est invalide.";
    }

    if (strlen($_POST["message"]) > 5000) {
        $errors[] = "Votre message doit faire moins de 5000 caractères.";
    }

    if (count($errors)) {
        $page = new Page([
            "title" => "Contact",
            "variables" => [
                "error" => implode("<br>", $errors)
            ]
        ]);
        $page->setContentFromFile("../../pages/contact/error.html")->render();
        die();
    }
}

if (isset($_POST["confirm"])) {
    $errors = [];
    if ($_POST["mail"] !== $_SESSION["mail"]) {
        $errors[] = "L'adresse email est incohérente.";
    }

    if ($_POST["phone"] !== $_SESSION["phone"]) {
        $errors[] = "Le numéro de téléphone incohérent.";
    }

    if (count($errors)) {
        $errors[] = "Vous devez indiquer la même informations dans le formulaire de contact et dans la confirmation d'envoie.";
        $page = new Page([
            "title" => "Contact",
            "variables" => [
                "error" => implode(" ", $errors)
            ]
        ]);
        $page->setContentFromFile("../../pages/contact/error.html")->render();
        die();
    }
    else {
        $to = CONTACT_EMAIL;
        $subject = ORG_NAME . " : " . $_SESSION["subject"] . " de " . $_SESSION["name"];

        $headers['From'] = CONTACT_FROM_NAME. ' <'.CONTACT_FROM_EMAIL.'>';
        $headers['Reply-To'] = $_SESSION["mail"];
        $headers['MIME-Version'] = 'MIME-Version: 1.0';
        $headers['Content-type'] = 'text/html; charset=UTF-8';

        $message = '
        <html>
        <head>
            <title>'.$_SESSION['subject'].' de '.$_SESSION['name'].'</title>
        </head>
        <body>
            <p><em>Vous trouverez ci-après un message envoyé depuis cleanr-renovation.ch</em></p>
            <h2 style="font-size:18px">Informations sur l\'expéditeur</h2>
            <p>
            Nom : <strong>'.$_SESSION['name'].'</strong><br>
            Société : <strong>'.$_SESSION['society'].'</strong><br>
            E-mail : <strong>'.$_SESSION['mail'].'</strong><br>
            Téléphone : <strong>'.$_SESSION['phone'].'</strong><br>
            </p>
            <h2 style="font-size:18px">'.$subject.'</h2>
            <p>
            '.nl2br($_SESSION['message']).'
            </p>
        </body>
        </html>
        ';

        $result = mail($to, $subject, $message, $headers);

        session_destroy();

        if ($result) {
            $page = new Page([
                "title" => "Contact"
            ]);
            $page->setContentFromFile("../../pages/contact/success.html")->render();
        } else {
            $page = new Page([
                "title" => "Contact",
                "variables" => [
                    "error" => "Une erreur est survenue dans l'envoie du message. Nous vous invitons à nous contacter par téléphone."
                ]
            ]);
            $page->setContentFromFile("../../pages/contact/error.html")->render();
        }
        die();
    }
}

$page = new Page([
    "title" => "Contact"
]);

$page->setContentFromFile("../../pages/contact/send.html")->render();