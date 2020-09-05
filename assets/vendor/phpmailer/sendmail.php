<?php
// On va chercher la classe PHPMailer
require_once('class.phpmailer.php');

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
  $mail->AddAddress("hauguel.frederic@gmail.com", "Jérôme HAUGUEL - Vap'Mobile");
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