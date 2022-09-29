<?php 
    $info = $_POST;

    if(isset($info['Login'])){
      require_once './login.php';
    } else if(isset($info['Register'])){
      include_once './register.php';
    }

?>