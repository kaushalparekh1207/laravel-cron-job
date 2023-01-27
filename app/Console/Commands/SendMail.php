<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class SendMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Mail to User Using Cron Job';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            $mail = new PHPMailer(true);
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'kaushal.parekh@hackberrysoftech.com';                     //SMTP username
            $mail->Password   = 'yiypmlrxfyushozm';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('kaushal.parekh@hackberrysoftech.com', 'Kaushal Parekh');
            $mail->addAddress('kkaushal8511@gmail.com');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
            // $mail->addCC('cc@example.com');
            // $mail->addBCC('bcc@example.com');
        
            // //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Send Mail Using PHPMailer in Laravel';
            $mail->Body    = 'This is a test Message';
            // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
            // toastr()->success('Mail has been Sent Successfully!');
            echo 'Mail Sent Successfully';
        } catch (Exception $e) {
            echo 'Mail could not be Sent!';
            // toastr()->error('Mail could not be Sent!');
            // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
