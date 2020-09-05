<?php

$to = "hauguel.frederic@gmail.com";
$subject = "Formulaire de contact Vap'Mobile - Message de $name";
$message = "Madame ou monsieur $name a laissé pour vous le message suivant : <br><br>$message<br><br>Vous pouvez la/le joindre au numéro suivant<br><br>$phone"; 
$from = "contact@vap-mobile.fr";

// Envoi d'email
if(mail($to, $subject, $message)){
    echo "Votre message a été envoyé avec succès!";
} else{
    echo "Impossible d'envoyer des emails. Veuillez réessayer.";
}