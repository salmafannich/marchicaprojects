<?php
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'e21205b207c3ff031906575712edab6f13eb0b361f2085f1f1237b7126d785e826a450292b6cfd1d64d92e6563bbde02') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_OFF;  // Change to SMTP::DEBUG_SERVER for debugging
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'salma.fannich2002@gmail.com'; // Votre adresse Gmail
    $mail->Password = 'SaSa/2002'; // Le mot de passe de votre compte Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('votre@gmail.com', 'Votre Nom');
    $mail->addAddress('salma.fannich2002@gmail.com', 'Salma Fannich');

    $mail->isHTML(true);
    $mail->Subject = 'Sujet de l\'e-mail';
    $mail->Body    = 'Contenu de l\'e-mail en HTML <b>en gras</b>';
    $mail->AltBody = 'Contenu de l\'e-mail en texte brut';

    $mail->send();
    echo 'Votre message a été envoyé avec succès.';
} catch (Exception $e) {
    echo "Erreur lors de l'envoi de l'e-mail : {$mail->ErrorInfo}";
}
?>
