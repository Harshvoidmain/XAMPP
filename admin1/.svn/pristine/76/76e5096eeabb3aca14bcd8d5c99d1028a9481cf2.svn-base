<?php

class EmailsComponent extends Component {

    public $components = array('Notification', 'Session');

    /**
     *
     * @param type $type
     * @param type $extraData
     */
    public function send($type = null, $data = array()) {
//        $from = $accountType = $attachment = NULL;
        $subject = $this->getSubject($type, $data);
        $message = $this->getMessage($type, $data);
        switch ($type) {
            case 'user-register':
                $to = $data['User']['e_mail'];
                break;
            case 'user-enquiry-add':
                $to = $data['User']['e_mail'];
                break;
            case 'user-birthday':
                $to = $data['User']['e_mail'];
                break;
            case 'user-upcoming-birthday':
                $to = $data['User']['e_mail'];
                break;
            case 'user-anniversary':
                $to = $data['User']['e_mail'];
                break;
            case 'user_forgot_password':
                $to = $data['to'];
                break;
            case 'contact_us':
                $to = $data['email'];
                break;
            case 'contact_us_admin':
//                $to = vivek.sdtt@gmail.com;
                $to = 'gautaml.eiosys@gmail.com';
                break;
            case 'book_now_enquiry':
//                $to = vivek.sdtt@gmail.com;
                $to = $data['User']['e_mail'];
                break;
            case 'book_now_enquiry_admin':
//                $to = vivek.sdtt@gmail.com;
                $to = 'gautaml.eiosys@gmail.com';
                break;
        }
        if (!isset($bcc)) {
            $bcc = null;
        }
        if (!isset($cc)) {
            $cc = null;
        }
        $this->Notification->sendMail($to, $subject, $message, 'support_ps', null, null, null);
    }

    private function getSubject($case = null, $data = array()) {

        switch ($case) {
            case 'user-register':
                return 'Welcome to World Queens';
                break;
            case 'user-enquiry-add':
                return 'World Queens-Enquiry Notification';
                break;
            case 'user-birthday':
                return 'Greetings';
                break;
            case 'user-anniversary':
                return 'Greetings';
                break;
            case 'user_forgot_password':
                return 'User - Reset Password';
                break;
            case 'contact_us':
                return 'ContactUs Notification';
                break;
            case 'contact_us_admin':
                return 'ContactUs Notification';
                break;
            case 'book_now_enquiry':
                return 'Booking Confirmation';
                break;
            case 'book_now_enquiry_admin':
                return 'Book Now Enquiry';
                break;
        }
    }

    private function getMessage($case = null, $data = array()) {
        switch ($case) {
            case 'user-register':
                $msg = '<b>Dear ' . $data['User']['full_name'] . ',</b><br><br> Thank you for registering with World Queen team!  <br><br>Here are your account details:<br><br><b>Username : </b>' . $data['User']['user_name'] . '<br><b>Password : </b>' . $data['User']['plain_password'] . '<br><br>Please click here to <a href="http://www.eioapp.com/queens/login" style="text-decoration:none;"<strong>Login</strong></a> on World Queen.
         <br><br>If you have not registered on the website and still received this e-mail, please click on this link<a href="http://www.eioapp.com/queens/" style="text-decoration:none;"> : http://www.eioapp.com/queens/ </a>
         <br><br>For any query you can write us at : <a href="mailto:support@customerguardian.com ">support@worldqueen.com </a>';
                return $msg;
                break;
            case 'user-enquiry-add':
                $msg = '<b>Dear ' . $data['User']['full_name'] . ',</b><br><br> You added enquiry!!!<br><br>Our team will contact u soon<br><br>If you have not registered on the website and still received this e-mail, please click on this link<a href="http://www.eioapp.com/queens/" style="text-decoration:none;"> : http://www.eioapp.com/queens/ </a><br><br>For any query you can write us at : <a href="mailto:support@customerguardian.com ">support@worldqueen.com </a>';
                return $msg;
            case 'user-birthday':
                $msg = '<b>Dear ' . $data['Consumer']['full_name'] . ',</b><br><br>Your birthday is the most special day in your life, so enjoy it to the fullest! Here\'s wishing you a very Happy Birthday and a day filled with lot of joy and happiness!<br><br>Regards,<br>CustomerGuardian Team';
                return $msg;
                break;
            case 'user-anniversary':
                $msg = '<b>Dear ' . $data['Consumer']['full_name'] . ',</b><br><br>Happy anniversary! We congratulate you on another year of love and marriage. Have a delightful anniversary.<br><br>Regards,<br>CustomerGuardian Team';
                return $msg;
                break;
            case 'user-upcoming-birthday':
                $msg = '<b>Hello ' . $data['Consumer']['full_name'] . ',</b><br><br>Never forget any birthdays of your CustomerGuardian friends. Here is the list of some upcoming birthdays in the coming week. You can now send birthday wishes to your friends in your network and make them feel special on their special day!
                    <br><br>
                    ' . $data['Friend'];
                return $msg;
                break;
            case 'user_forgot_password':
                return 'Hello' . '<b>' . $data['full_name'] . '</b>' . ',<br>
                    Looks like you are having problems in logging in because of your password! Do not worry,
                        This is your new password ' . $data['new_password'] . '
                        For any further queries or concerns, you are free to write to us on <a href="mailto:support@customerguardian.com">support@worldqueen.com</a><br>
                        <br>
                        Thank You,<br>
                        Team WorldQueen';
                break;
            case 'contact_us':
                return 'Hello ' . '<b>' . $data['name'] . '</b>' . ',<br>
                        Our Sales team will contact you soon,
                        For any further queries or concerns, you are free to write to us on <a href="mailto:support@customerguardian.com">support@worldqueen.com</a><br>
                        <br>
                        Thank You,<br>';
                break;
            case 'contact_us_admin':
                return 'Hi' . ',<br>
                    User Name:-<b>' . $data['name'] . '</b>
                    User Email:-<b>' . $data['email'] . '</b>
                    User Contact:-<b>' . $data['contact'] . '</b>
                    User Message:-<b>' . $data['message'] . '</b><br>
                        Thank You,<br>';
                break;
            case 'book_now_enquiry':
                return 'Hello ' . '<b>' . $data['User']['full_name'] . '</b>' . ',<br>
                        Thanks For using World-Queens.Your request has been sent to admin.
                        Our Sales team will contact you soon,
                        For any further queries or concerns, you are free to write to us on <a href="mailto:support@customerguardian.com">support@worldqueen.com</a><br>
                        <br>
                        Thank You,<br>';
                break;
            case 'book_now_enquiry_admin':
                return 'Hi' . ',<br>
                    User Name:-<b>' . $data['User']['full_name'] . '</b>
                    User Email:-<b>' . $data['User']['e_mail'] . '</b>
                    User Contact:-<b>' . $data['User']['contact_no'] . '</b>
                    User Message:-<b>' . $data['Package']['message'] . '</b><br>
                        Thank You,<br>';
                break;
        }
    }

}

?>
