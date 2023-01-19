<?php
// Bindung/Include
require_once 'inc.php';
require_once 'mail.class.php';

// Hier wird das Objekt initialisiert:
$MyEmail = new MyEmailClass();
$MyEmail->setMailAdressen($emailadressen)->setSubject('Hallo Du')->setMessage('Testnachroicht')->sendMail();
?>