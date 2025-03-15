<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * CakePHP NotificationComponent
 * @author Eiosys
 */
APP::uses('NotificationComponent', 'Component');
App::uses('CakeEmail', 'Network/Email');

class NotificationComponent extends Component {

    public $components = array();
    public $controller = null;
    public $subject = 'Project Solutions', $message = 'No text to display';

    public function initialize(\Controller $controller) {
        parent::initialize($controller);
        $this->controller = $controller;
    }

    public function sendMail($to = array(), $subject = '', $message = '', $accountType = '', $attachment = array(), $bcc = array(), $cc = array()) {
        if (is_string($to)) {
            $to = array($to);
        }
        if (empty($to)) {
            return;
        }
        if (is_string($cc)) {
            $cc = array($cc);
        }
        if (is_string($bcc)) {
            $bcc = array($bcc);
        }
        if (empty($subject)) {
            $subject = $subject;
        }
        if (empty($message)) {
            $message = $message;
        }
        //attachment
        if (is_string($attachment)) {
            if (strpos($attachment, 'not_available') !== FALSE) {
                $attachment = null;
            } else {
                $attachment = array($attachment);
            }
        }
        if (empty($attachment)) {
            $attachment = null;
        } else {
            $temp_attachement = array();
            foreach ($attachment as $a) {
                if (isset($a['file']) && file_exists_remote($a['file'])) {
                    array_push($temp_attachement, $a);
                } else if (file_exists_remote($a)) {
                    array_push($temp_attachement, $a);
                }
            }
            $attachment = $temp_attachement;
        }
        if (!is_array($to)) {
            $to = array($to);
        }
        if (!is_array($cc)) {
            $cc = array($cc);
        }
        if (!is_array($bcc)) {
            $cc = array($cc);
        }
        if (TRUE) {
            //using cake
            $Email = new CakeEmail($accountType);
            $Email->from(array('vrushali.chaudhari@eiosys.com' => 'Queen Travels'));
            $Email->to($to)
                    ->subject($subject);
            if (!empty($attachment)) {
                $Email->addAttachments($attachment);
            }
            $Email->send($message);
        }
        if (FALSE) {
            if (!empty($to)) {
                $headers = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text / html;
            charset = iso-8859-1' . "\r\n";
                $headers .= 'From: World Queen' . "\r\n";
                $mail_body = file_get_contents(APP . WEBROOT_DIR . DS . 'files' . DS . 'email' . DS . 'mail');
                $mail_body = str_replace('$message', $message, $mail_body);
                if (is_array($to)) {
                    $to = join($to, ', ');
                }
                if (mail($to, $subject, $mail_body, $headers)) {
//                    mail($email, $subject, $message, $headers, '-freturn@address');
                } else {
                    
                }
            }
        }
    }

    function generate_password($length = 6, $strength = 4) {
        $vowels = 'aeuy';
        $consonants = 'bdghjmnpqrstvz';
        if ($strength & 1) {
            $consonants = $consonants . 'BDGHJLMNPQRSTVWXZ';
        }
        if ($strength & 2) {
            $vowels .= "AEUY";
        }
        if ($strength & 4) {
            $consonants .= '23456789';
        }
        if ($strength & 8) {
            $consonants .= '@#$%';
        }

        $password = '';
        $alt = time() % 2;
        for ($i = 0; $i < $length; $i++) {
            if ($alt == 1) {
                $password .= $consonants[(rand() % strlen($consonants))];
                $alt = 0;
            } else {
                $password .= $vowels[(rand() % strlen($vowels))];
                $alt = 1;
            }
        }
        return $password;
    }

    public $sms_message = 'Failed to display message';

    public function sendSms($sms_numbers, $sms_message = '') {
        if (is_string($sms_numbers)) {
            $sms_numbers = array($sms_numbers);
        }
        if (empty($sms_numbers)) {
            return;
        }
        if (empty($sms_message)) {
            $sms_message = $sms_message;
        }
        if (!empty($sms_numbers)) {
            if (is_array($sms_numbers)) {
                $sms_numbers = implode(",", $sms_numbers);
            }
            $url = 'http://sms.eiosys.com/sendhttp.php?user=saurabh999&password=eiosys999&mobiles=' . rawurlencode($sms_numbers) . '&message=' . rawurlencode($sms_message) . '&sender=Travel';
            $data = file_get_contents($url);
            return;
        }
    }

}
