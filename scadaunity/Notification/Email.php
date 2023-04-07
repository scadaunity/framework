<?php

namespace ScadaUnity\Notification;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;

/**
 * Classe responsavel pelo envios de email da applicação
 */
class Email
{
  /** @var PHPMailer */
  private $mail;

  /** @var stdClass */
  private $data;

  /** @var Exception */
  private $error;

  public function __construct()
  {
    $this->mail = new PHPMailer(true);
    $this->data = new stdClass();
    $this->mail->isSMTP();
    $this->mail->isHTML();
    $this->mail->setLanguage("br");
    $this->mail->SMTPAuth = true;
    $this->mail->SMTPSecure = "tls";
    $this->mail->CharSet = "UTF-8";
    $this->mail->Encoding = 'base64';
    $this->mail->Host = getenv('MAIL_HOST');
    $this->mail->Port = getenv('MAIL_PORT');
    $this->mail->Username = getenv('MAIL_USERNAME');
    $this->mail->Password = getenv('MAIL_PASSWORD');

  }

  /**
   * Metodo responsavel por montar o email
   * @param  string $subject
   * @param  string $body
   * @param  string $recipient_name
   * @param  string $recipient_email
   * @return Email
   */
  public function add(string $subject, string $body, string $recipient_name = null, string $recipient_email) : Email
  {
    $this->data->subject = $subject;
    $this->data->body = $body;
    $this->data->recipient_name = $recipient_name;
    $this->data->recipient_email = $recipient_email;
    return $this;
  }

  /**
   * Metodo responsavel por adicionar os anexos
   * @param  string $filePath
   * @param  string $fileName
   * @return Email
   */
  public function attach(string $filePath, string $fileName) : Email
  {
    $this->data->attach[$filePath] = $fileName;
    return $this;
  }

  /**
   * Metodo responsavel por enviar o email
   * @param  string $from_name
   * @param  string $from_address
   * @return bool
   */
  public function send(string $from_name = null , string $from_address = null): bool
  {
    try{

      // Monta os dados do email
      $this->mail->Subject = $this->data->subject;
      $this->mail->msgHTML($this->data->body);
      $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_email);
      $this->mail->setFrom($from_address, $from_name);

      // Verifica se existe anexo para enviar
      if(!empty($this->data->attach)){
        foreach ($this->data->attach as $path => $name) {
          $this->mail->addAttachment($path, $name);
        }
      }

      $this->mail->send();
      return true;

    }catch(Exception $exception){

      $this->error = $exception;
      return false;
    }
  }

  /**
   * Metodo responsavel por exibir erros no objeto de email
   * @return [type]
   */
  public function error(): ?Exception
  {
    return $this->error;
  }

}
