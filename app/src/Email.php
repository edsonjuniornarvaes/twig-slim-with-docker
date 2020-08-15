<?php

namespace app\src;

use app\templates\Template;
use PHPMailer\PHPMailer\PHPMailer;

class Email{

    private $data;
    private $template;

    private function config(){
        return (object) Load::file('/config.php');
    }

    public function data(array $data){
        $this->data = (object)$data;

        return $this;
    }

    public function template(Template $template){
        if(!isset($this->data)){
            throw new \Exception("Antes de chamar o template, passe os dados atraves do metodo data");
        }

        $this->template = $template->run($this->data);

        return $this;
    }

    public function send(){

        if(!isset($this->template)){
            throw new \Exception("Por favor, antes de enviar o email, escolha um template com o método template");
        }

        $mailer = new PHPMailer;

        $config = (object)$this->config()->email;

        $mailer->SMTPDebug = 2;                                 // Enable verbose debug output
        $mailer->isSMTP();                                      // Set mailer to use SMTP
        $mailer->Host = $config->host;  
        $mailer->SMTPAuth = true;                               // Enable SMTP authentication
        $mailer->Username = $config->username;             // SMTP username
        $mailer->Password = $config->password;                           // SMTP password
        $mailer->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mailer->Port = $config->port;                                    // TCP port to connect to
        $mailer->CharSet = "UTF-8";                                    // TCP port to connect to

        //Recipients
        $mailer->setFrom($this->data->fromEmail, $this->data->fromName);
        $mailer->addAddress($this->data->toEmail, $this->data->toName);     // Add a recipient

        //Content
        $mailer->isHTML(true);                                  // Set email format to HTML
        $mailer->Subject = $this->data->assunto;
        $mailer->Body    = $this->template;
        $mailer->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mailer->send();
    }

}