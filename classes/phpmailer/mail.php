<?php
include('phpmailer.php');
class Mail extends PhpMailer
{
 // From Address - Required for SMTP or phpmailer
    public $From     = 'hello@domain.com';
//    Uncomment if using SMTP
//    public $Host     = 'smtp.domain.com';
//    public $Mailer   = 'smtp';
//    public $SMTPAuth = true;
//    public $Username = 'hello@domain.com';
//    public $Password = 'Password';
//    public $SMTPSecure = 'tls';

    public $WordWrap = 75;

    public function subject($subject)
    {
        $this->Subject = $subject;
    }

    public function body($body)
    {
        $this->Body = $body;
    }

    public function send()
    {
        $this->AltBody = strip_tags(stripslashes($this->Body))."\n\n";
        $this->AltBody = str_replace("&nbsp;", "\n\n", $this->AltBody);
        return parent::send();
    }
}