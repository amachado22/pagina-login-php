<?php

    include_once './config.php';
    session_start();

    function validate($data) {
        //Quitar espacios en blanco
        $data = trim($data);
        //Quitar etiquetas html
        $data = stripslashes($data);
        //Quitar etiquetas php
        $data = htmlspecialchars($data);
        return $data;
    }

    if(isset($info['email']) && isset($info['password'])){
        $info = $_POST;


        $email = validate($info['email']);
        $password = validate($info['password']);
        
        $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();

        if ($query->rowCount() > 0) {
            
            $user = $query->fetch(PDO::FETCH_ASSOC);
            $passwordHash = password_hash(validate($user['password']), PASSWORD_DEFAULT);

            if (password_verify($password, $passwordHash)) {
                $_SESSION['user'] = $user['id'];
                $_SESSION['name'] = $user['email'];
                $_SESSION['authenticated'] = true;

                header('Location: ../Pages/home.php?message=successlogin');
            } else {
                header('Location: ../Pages/home.php?message=errorlogin');
            }
        }
        
    }

?>