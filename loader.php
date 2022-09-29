<?php
    require('../vendor/autoload.php');

    $loader2 = new \Twig\Loader\FilesystemLoader('../views');
    $twig2 = new \Twig\Environment($loader2, [
        'cache' => false,
    ]);

    function renderViews($view, $data = [], $template){
        global $twig2;
        $base = $twig2->load('./Templates/' . $template);
        return  $twig2->render($view, array_merge(['base' => $base], $data));
    }

?>