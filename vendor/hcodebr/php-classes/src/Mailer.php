<?php 

namespace Hcode;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

use Rain\Tpl;


class Mailer {
	
	const USERNAME = "ernaniu@hotmail.com";
	const PASSWORD = "Eu@24011981";
	const NAME_FROM = "Hcode Store";

	private $mail;

	public function __construct($toAddress, $toName, $subject, $tplName, $data = array())
	{

		$config = array(
			"tpl_dir"       => $_SERVER["DOCUMENT_ROOT"]."/views/email/",
			"cache_dir"     => $_SERVER["DOCUMENT_ROOT"]."/views-cache/",
			"debug"         => false
	    );

		Tpl::configure( $config );

		$tpl = new Tpl;

		foreach ($data as $key => $value) {
			$tpl->assign($key, $value);
		}

		$html = $tpl->draw($tplName, true);

		$this->mail = new PHPMailer(true);

		$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                   //SMTP::DEBUG_OFF; SMTP::DEBUG_SERVER; Enable verbose debug output
    	$this->mail->isSMTP();                                         //Send using SMTP
    	$this->mail->Host       = 'smtp.live.com';                     //Set the SMTP server to send through
    	$this->mail->SMTPAuth   = true;                                //Enable SMTP authentication
    	$this->mail->Username   = Mailer::USERNAME;                    //SMTP username
    	$this->mail->Password   = Mailer::PASSWORD;                    //SMTP password
		//    mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;          //Enable implicit TLS encryption
    	$this->mail->Port       = 587;                                 //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
		$this->mail->isHTML(true); 
		
		//Set who the message is to be sent from
		$this->mail->setFrom(Mailer::USERNAME, Mailer::NAME_FROM);

		//Set an alternative reply-to address
		//$this->mail->addReplyTo('replyto@example.com', 'First Last');

		//Set who the message is to be sent to
		$this->mail->addAddress($toAddress, $toName);

		//Set the subject line
		$this->mail->Subject = $subject;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$this->mail->msgHTML($html);

		//Replace the plain text body with one created manually
		$this->mail->AltBody = 'This is a plain-text message body';

		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');

	}

	public function send()
	{

		return $this->mail->send();

	}

}

 ?>