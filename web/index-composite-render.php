<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

const PROJECT_ROOT = __DIR__ . '/../';

require_once PROJECT_ROOT . 'vendor/autoload.php';

use app\HtmlTag;
use app\bootstrap\Alert;

?>

<!DOCTYPE html>
<html lang="ru-RU" class="h-100">
<head>
    <title>
        ООП Песочница
    </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link type="image/x-icon" href="favicon.ico" rel="icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="d-flex flex-column h-100">
    <?php

        $tags = [];

        $tags[] = new HtmlTag(
            'first-alert',
            'alert alert-primary',
            'Это уведомление #1',
            ['box-shadow' => '10px 10px 5px 0px black'],
        );

        $styleTypes = [
            'primary',
            'warning',
            'danger',
            'secondary',
            'success',
        ];

        for ($i=2; $i <= 5; $i++) {
            $type = $styleTypes[array_rand($styleTypes)];

            $tags[] = new HtmlTag(
                'first-alert',
                'alert alert-' . $type,
                "Это уведомление #$i в стиле \"$type\"",
                ['box-shadow' => '10px 10px 5px 0px black'],
            );
        }

        for ($i=1; $i <= 5; $i++) {

            $type = $styleTypes[array_rand($styleTypes)];

            $tags[] = new Alert(
                "Это уведомление типа Alert #$i в стиле \"$type\"",
                $type,
                ['box-shadow' => '10px 10px 5px 0px black'],
            );
        }

    ?>

    <?= (new HtmlTag('main', 'flex-shrink-0', '', [], 'main', ['role="main"']))
            ->addInnerTag(
                (new HtmlTag('main-block', 'container'))
                    ->addInnerTags([
                        (new HtmlTag(null, 'text-center mb-4 mt-3'))
                            ->addInnerTag(
                                new HtmlTag(null, '','ООП Песочница', [], 'h1'),
                            ),
                        ...$tags
                    ])
            )
    ?>
</body>