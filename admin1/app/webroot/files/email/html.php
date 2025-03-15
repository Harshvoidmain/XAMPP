<?php
// multiple recipients
$to = 'sagarb.eiosys@gmail.com' . ', '; // note the comma
$to .= 'mubasshir@eiosys.com';

// subject
$subject = 'Birthday Reminders for August';
//from
//$from='amitk.eiosys@gmail.com';

// message
$message = '
<html>
<head>
  <title>Birthday Reminders for August</title>
</head>
<body>
  <p>Here are the birthdays upcoming in August!</p>
  <table>
    <tr>
      <th>Person</th><th>Day</th><th>Month</th><th>Year</th>
    </tr>
    <tr>
      <td>Joe</td><td>3rd</td><td>August</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17th</td><td>August</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';
//
// To send HTML mail, the Content-type header must be set
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
// Mail it
if (mail($to, $subject, $message,$headers)) {
    echo 'sent';
} else {
    echo 'not sent';
}
mail_send(array(
    'to_email' => $to,
    'from_email' =>'amitk.eiosys@gmail.com',
    'subject' => $subject,
    'message' => $message,   
));

function mail_send($arr) {
    if (!isset($arr['to_email'], $arr['from_email'], $arr['subject'], $arr['message'])) {
        throw new HelperException('mail(); not all parameters provided.');
    }

    $to = empty($arr['to_name']) ? $arr['to_email'] : '"' . mb_encode_mimeheader($arr['to_name']) . '" <' . $arr['to_email'] . '>';
    $from = empty($arr['from_name']) ? $arr['from_email'] : '"' . mb_encode_mimeheader($arr['from_name']) . '" <' . $arr['from_email'] . '>';

    $headers = array
        (
        'MIME-Version: 1.0',
        'Content-Type: text/html; charset="UTF-8";',
        'Content-Transfer-Encoding: 7bit',
        'Date: ' . date('r', $_SERVER['REQUEST_TIME']),
        'Message-ID: <' . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>',
        'From: ' . $from,
        'Reply-To: ' . $from,
        'Return-Path: ' . $from,
        'X-Mailer: PHP v' . phpversion(),
        'X-Originating-IP: ' . $_SERVER['SERVER_ADDR'],
    );
    echo 'ok';
    mail($to, '=?UTF-8?B?' . base64_encode($arr['subject']) . '?=', $arr['message'], implode("\n", $headers));
}

?>