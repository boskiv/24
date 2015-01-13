<?php

if(isset($_POST['name_zakaz_home'])) {
    require 'PHPMailerAutoload.php';

    $name = $_POST['name_zakaz_home'];
    $email = $_POST['email_zakaz_home'];
    $message = $_POST['message_zakaz_home'];
    $fstring = $_POST['fstring'];

    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.inbox.ru';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'diplom24@inbox.ru';                 // SMTP username
    $mail->Password = 'xxxXXX123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';

    $mail->From = 'diplom24@inbox.ru';
    $mail->FromName = 'Mailer';
    $mail->addAddress('diplom24@inbox.ru', 'Website');     // Add a recipient

    $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Заказ с сайта';
    $mail->Body    = 'Имя:'.$name.'<br>Email:'.$email.'<br> Сообщение: '.$message.'<br>'.$fstring.'<br>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
        echo 'Message could not be sent.';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Message has been sent';
    }
}