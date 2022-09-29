<?php 
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require '../vendor/autoload.php';
    
    
    function sendEmail($name, $email) {
        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug =  SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =  'amachado3123@gmail.com';
            $mail->Password = 'HPMzr0112';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Destinatários
            $mail->setFrom('amachado3123@gmail.com', 'Adailton machado');
            $mail->addAddress($email, $name);


            $mail->isHTML(true);                          
            $mail->Subject = 'Adailton Machado, Full Stack Developer';
            $mail->Body    = 'Este é o corpo de mensagens HTML <b>in bold!</b>';
            $mail->AltBody = 'Este é o corpo em texto simples para clientes de e-mail não-HTML';

            //Verifique se o e-mail é enviado corretamente
            if($mail->send()) {
                $mail->send();
                return true;
            } else {
                return false;
            }

        } catch (Exception $e) {
            return $e;
        }

    }
?>