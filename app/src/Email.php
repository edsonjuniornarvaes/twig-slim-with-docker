<?php

namespace app\src;

class Email 
{
    private $data;

    public function data (array $data)
    {
        $this->data = (object)$data;
        return $this;
    }

    public function template($template)
    {
        if(!isset($this->data))
        {
            throw new \Exception("Antes de chamar o template, passe os dados através do método data");   
        }
    }

    public function send()
    {
        $mailer = new PHPMailer;

        $mailer->SMTPDebug = SMTP::DEBUG_SERVER;               // Enable verbose debug output
        $mailer->isSMTP();                                     // Send using SMTP
        $mailer->Host       = '';
        $mailer->SMTPAuth   = true;                            // Enable SMTP authentication
        $mailer->Username   = '';                              // SMTP username
        $mailer->Password   = '';                              // SMTP password
        $mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mailer->Port       = 465;                                // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mailer->setFrom('from@example.com', 'Mailer');
        $mailer->addAddress('joe@example.net', 'Joe User');     // Add a recipient

        // Content
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->Subject = 'assunto';
        $mailer->Body    = 'temlate';
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();
    }
}