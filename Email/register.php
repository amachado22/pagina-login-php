<?php 
    include_once './config.php';
    include_once './sendEmail.php';


    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if (isset($_POST['Register'])) {
        $info = $_POST;
        
        if(isset($info['email']) && isset($info['password'])){
            $email = validate($info['email']);

            $password = validate($info['password']);

            if (empty($email)) {

                header('Location: ../index.php?error=emptynome de usuário é necessário');
                exit();

            } else if (empty($password)) {
                
                header('Location: ../index.php?error=emptysenha é necessária');
                exit();

            } else {

                $query = $connection->prepare("SELECT * FROM users WHERE email=:email");
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->execute();

                if ($query->rowCount() > 0) {
                    echo '<p class="error">O endereço de e-mail já está cadastrado!</p>';
                }

                if($query->rowCount() == 0) {
                    $query = $connection->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
                    //Vincular los parametros con los valores
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':password', $password, PDO::PARAM_STR);
                    
                    if(sendEmail($email, $email)) {
                        $result = $query->execute();
                        sendEmail($email, $email);
                        if($result) {
                            header('Location: ../Pages/registerLogin.php?message=successregister');
                        } else {
                            header('Location: ../Pages/registerLogin.php?message=errorregister');
                        }
                    } else {
                        header('Location: ../Pages/registerLogin.php?message=errorregister');
                    }
                }
            }

        } else {
            echo "Nem todos os campos estão cheios";
            header("Location: index.php");
            exit();
        }
               
    }

?>