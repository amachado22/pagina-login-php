<?php 
    include '../loader.php';
    session_start();
    
    if(!$_SESSION["authenticated"]) {
        header('Location: ../index.php?message=authenticatedfalse');
    }

    if ($_GET["message"] == "successlogin") {

        $nameUser = $_SESSION['name'];
        echo renderViews(
            'success.html.twig', 
            [
                'titlePage' => 'Success',
                'title' => 'Você fez login com sucesso!' . $nameUser,
                'text' => 'Agora você pode acessar o aplicativo.',
                'textBtn' => 'Log out',
                'urlImage' => '../Public/Image/success.png',
                'urlCss' => '../SRC/CSS/success.css',
                'idBtn' => 'getoutlogin',
                'urlJS' => '../SRC/JS/index.js',
            ] , 
            'template-base-html.html.twig'
        );
    }

    if($_GET["message"] == "errorlogin") {
        echo renderViews(
            'error.html.twig',
            [
                'titlePage' => 'Error Login',
                'title' => 'Oops! Algo deu errado.',
                'text' => "Agora você não pode acessar o aplicativo.",
                'textBtn' => 'Get back',
                'urlImage' => '../Public/Image/success.png',
                'urlCss' => '../SRC/CSS/error.css',
                'idBtn' => 'getoutindex',
                'urlJS' => '../SRC/JS/index.js',
            ],
            "template-base-html.html.twig"
        );
    }



   
?>