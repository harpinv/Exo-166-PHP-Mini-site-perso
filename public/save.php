<?php
if(isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['age']) && isset($_POST['mail']) && isset($_POST['numero'])) {

    session_start();
    $jsonMessage = file_put_contents("../data/last_message.json", $_POST);
    json_encode($jsonMessage);

    header('Location: admin.php');

    $to = 'vincent.harpin@gmail.com';
    $subject = 'Un mail de contact';
    $message = "Vous avez eu un contact\r\nNom: " . $_POST['nom'] . "\r\nPrénom: " . $_POST['prenom'] . "\r\nAge: " . $_POST['age'] . "\r\nAdresse mail: " . $_POST['mail'] . "\r\nNuméro de téléphone: " . $_POST['numero'];
    mail($to, $subject, $message);

    $time = time() + (60 * 60 * 24);
    setcookie(session_name(), session_id(), $time);

    $_SESSION['name'] = $_POST['name'];
    $_SESSION['prenom'] = $_POST['prenom'];

} else {
    echo "une erreur s'est produite lors de l'enregistrement";
}

