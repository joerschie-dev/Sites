<?php

// Interface/Schnittstelle der Methoden/Klassen
interface Email_Interface
{
    public function sendMail();
    public function isEmailValid($var);
}



class MyEmailClass implements Email_Interface
{
    // Setzen der Variablen
    private $subject;
    private $message;
    private $mail_adressen;
    private $header = array();


    // Getter and Setter Subject
    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject): self
    {
        $this->subject = $subject;
        return $this;
    }

    // Getter and Setter Nachricht
    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message): self
    {
        $this->message = $message;
        return $this;
    }

    // Getter and Setter Mail-Adressen
    public function getMailAdressen()
    {
        return $this->mail_adressen;
    }
    public function setMailAdressen($mail_adressen): self
    {
        $this->mail_adressen = $mail_adressen;
        return $this;
    }

    // Getter and Setter Header
    public function getHeader()
    {
        return $this->header;
    }
    public function setHeader($header): self
    {
        $this->header = $header;
        return $this;
    }


    // Ab hier wird die Mail versendet
    public function sendMail()
    {
        echo $this->isEmailValid($this->mail_adressen);
        echo count($this->mail_adressen);

    }

    // Wir prüfen ob eine Array oder ein String übergeben wurde
    // Ausserdem prüfen wir, ob angegebene Mail-Adressen valide sind
    public function isEmailValid($var)
    {
        if (is_array($var)) {
            $str = array();
            foreach ($var as $k => $v) {
                if (!filter_var($var[$k]['Mail'], FILTER_VALIDATE_EMAIL) === false) {
                    $str[] = $var[$k]['Mail'];
                } else {
                    continue;
                }
            }
            return implode(", ", $str);
        } else {
            if (!filter_var($var, FILTER_VALIDATE_EMAIL) === false) {
                return $var;
            } else {
                return "Prüfen Sie die angegebe Emailadresse des Empfängers";
            }
        }
    }
}

?>