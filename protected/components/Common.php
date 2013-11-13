<?php
/**
 * Common functions
 * 
 * @author Deory Pandu
 * @link http://con.cept.me
 */
class Common {

    public static function mail($config = array())
    {
        // bila from tidak di setting
        $config['from'] = ( ! isset($config['from']))?'info@markdesign.net':$config['from'];
        $config['bcc'] = ( empty($config['bcc']) )? array('deoryzpandu@gmail.com'):$config['bcc'];
        // echo $config['to']."<br>";
        // echo $config['message'];
        // exit;
        // self::mailMail($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        self::mailSmtp($config['to'], $config['from'], $config['subject'], $config['message'], $config['cc'], $config['bcc']);
        // self::mailTest();
    }
    public static function mailMail($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        if ( ! is_array($to)) {
            if ($to != '') {
                $to = array($to);
            }else{
                $to = array();
            }
            
        }
        if ( ! is_array($cc)) {
            if ($cc != '') {
                $cc = array($cc);
            }else{
                $cc = array();
            }
            
        }
        if ( ! is_array($bcc)) {
            if ($bcc != '') {
                $bcc = array($bcc);
            }else{
                $bcc = array();
            }
            
        }

        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        
        $mail->Mailer = "mail";
        
        $mail->ClearAddresses();

        foreach ($to as $key => $value) {
            $mail->AddAddress($value, $value);
        }
        foreach ($cc as $key => $value) {
            $mail->AddCC($value, $value);
        }
        foreach ($bcc as $key => $value) {
            $mail->AddBCC($value, $value);
        }

        $mail->From = $from;
        $mail->FromName = 'No Reply';
        $mail->AddReplyTo($from, 'No Reply');
        $mail->Html = TRUE;
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }
     public static function mailSmtp($to=array(), $from='', $subject='', $message='', $cc=array(), $bcc=array())
    {
        // multiple recipients
        if ( ! is_array($to)) {
            if ($to != '') {
                $to = array($to);
            }else{
                $to = array();
            }
            
        }
        if ( ! is_array($cc)) {
            if ($cc != '') {
                $cc = array($cc);
            }else{
                $cc = array();
            }
            
        }
        if ( ! is_array($bcc)) {
            if ($bcc != '') {
                $bcc = array($bcc);
            }else{
                $bcc = array();
            }
            
        }


        Yii::import('application.extensions.phpmailer.JPhpMailer');
        $mail = new JPhpMailer;
        
        $mail->IsSMTP();  // telling the class to use SMTP
        $mail->Mailer = "smtp";
        $mail->Host = Yii::app()->params['smtp_host'];
        $mail->Port = Yii::app()->params['smtp_port'];
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->Username = Yii::app()->params['smtp_username']; // SMTP username
        $mail->Password = Yii::app()->params['smtp_password']; // SMTP password 
        
        $mail->ClearAddresses();

        foreach ($to as $key => $value) {
            $mail->AddAddress($value, $value);
        }
        foreach ($cc as $key => $value) {
            $mail->AddCC($value, $value);
        }
        foreach ($bcc as $key => $value) {
            $mail->AddBCC($value, $value);
        }

        $mail->From = 'deo@markdesign.net';
        $mail->FromName = 'deo@markdesign.net';
        $mail->AddReplyTo($from, $from);
        $mail->Html = TRUE;
        $mail->Subject = $subject;
        $mail->MsgHTML($message);
        $mail->Send();
    }

}