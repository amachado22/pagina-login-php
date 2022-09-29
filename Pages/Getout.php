<?php 
    include '../loader.php';

    session_start();
    session_destroy();

    echo renderViews(
        'error.html.twig',
        [
            'titlePage' => 'Error Login',
            'title' => 'Oops! Algo deu errado..',
            'text' => "Agora você não pode acessar o aplicativo.",
            'textBtn' => 'Voltar',
            'urlImage' => '../Public/Image/success.png',
            'urlCss' => '../SRC/CSS/error.css',
        ],
        "template-base-html.html.twig"
    );

?>