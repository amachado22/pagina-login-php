<?php
    error_reporting(E_ERROR);
    require_once './vendor/autoload.php';

    $loader = new \Twig\Loader\FilesystemLoader('./views');

    $twig = new \Twig\Environment($loader, [
        'cache' => false,
    ]);

    $base = $twig->load('./Templates/template-base-html.html.twig');

    if($_GET['message'] === "logout") {
        session_start();
        session_destroy();
        header('Location: ./index.php');
    }

    if($_GET['message'] === "authenticatedfalse") {
        echo "<script>alert('Você deve fazer login para acessar o aplicativo.');</script>";
    }
    
    echo $twig->render('index-default.html.twig', 
    array('base' => $base, 'handle' => './Email/handleEmail.php'));

    
?>