<?php
// Fichiers requis :
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/Exception.php
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/PHPMailer.php
// https://raw.githubusercontent.com/PHPMailer/PHPMailer/master/src/SMTP.php
//=====Appel des fichiers requis
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'Exception.php';
    require 'PHPMailer.php';

    if (!empty($_POST)) {

      // Champs formulaire
      $name = $_POST['name'];
      $email = $_POST['email'];
      $phone = $_POST['phone'];
      $message = $_POST['message'];
    
      // Création d'un nouvel objet $mail
      $mail = new PHPMailer();
      // Encodage
      $mail->CharSet = 'UTF-8';
    
      // Corp de notre email
      $body = "Madame ou monsieur $name a laissé pour vous le message suivant : <br><br>$message<br><br>Vous pouvez la/le joindre au numéro suivant<br><br>$phone";
      // Expediteur, adresse de retour et destinataire :
      $mail->SetFrom("contact@vap-mobile.fr", "Formulaire de contact Vap'Mobile");
      $mail->AddReplyTo($email, $name);
      $mail->AddAddress("vapmobile47@gmail.com", "Jérôme HAUGUEL - Vap'Mobile");
      // Sujet du mail
      $mail->Subject = "Formulaire de contact Vap'Mobile - Message de $name";
      // Le message
      $mail->MsgHTML($body);
      // Envoi de l'email
      if ( !$mail->Send() ) {
        echo "Echec de l'envoi du mail, Erreur: " . $mail->ErrorInfo;
      } else {
        echo "Message envoyé!";
      }
      unset($mail);
    }