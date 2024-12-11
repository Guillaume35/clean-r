<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="utf-8">
        <title><?= $page->title ?> - Clean R - Spécialiste du nettoyage de cuisine industrielle, professionnelle</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/assets/bootstrap-5.3.2-dist/css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="/assets/style.css?5">

        <meta name="viewport" content="width=device-width, initial-scale=1" />
    </head>

    <body>
        <?php
        include(__DIR__."/header.php");
        ?>

        <div class="page-wrapper">
            <?= $page->content ?>
        </div>

        <?php
        include(__DIR__."/footer.php");
        ?>
        
        <script src="/template/menu.js" type="text/javascript"></script>
        <script src="/template/carousel.js" type="text/javascript"></script>
    </body>

</html>