<?php
// Fichiers requis :
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/Exception.php
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/PHPMailer.php
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php
//=====Appel des fichiers requis
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';

//=====Paramètres de contenu du mail
    //=====Adresse de destination du message (vous-meme pour un formulaire de contact).
    $to = "hauguel.frederic@gmail.com";
    //=====Définition du sujet de l'email.
    $subject = "Formulaire de contact Vap'Mobile - Message de $name";
    //=====Définition des variables à récupérer depuis votre formulaire
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];  
    //=====Déclaration des messages au format texte
    $body = "Madame ou monsieur $name a laissé pour vous le message suivant : <br><br>$message<br><br>Vous pouvez la/le joindre au numéro suivant<br><br>$phone";
    //==========

//=====Fonction d'envoi du mail - Rien à configurer ici
        $email = new PHPMailer;
        $email->CharSet = 'UTF-8';
        $email->isHTML(true);

        $email->From = $email;
        $email->FromName = "Vap's Mobile";
        $email->addAddress("hauguel.frederic@gmail.com");
        $email->addReplyTo($email, $name);

        $email->Subject = $subject;
        $email->Body    = $body;
        //$email->AltBody = $body;

//=====Envoi de l'e-mail.
        if(!$email->send()) {
            echo 'Le message ne peut être envoyé.';
            echo 'Erreur: ' . $email->ErrorInfo;
        } else {
            echo 'Merci, votre message a bien été envoyé.<br />';
        }
//==========