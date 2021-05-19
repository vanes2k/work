<?php

//Recaptcha

$response = $_POST["g-recaptcha-response"];
$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = [
  'secret' => '6LcpytMUAAAAAEGnXu6rd6SEEy-Yel_k5gkEeG-Z',
  'response' => $_POST["g-recaptcha-response"]
];
$options = [
  'http' => [
    'method' => 'POST',
    'content' => http_build_query($data)
  ]
];
$context  = stream_context_create($options);
$verify = file_get_contents($url, false, $context);
$captcha_success=json_decode($verify);
if ($captcha_success->success==false) {
    echo json_encode(array("code"=>0));
} else if ($captcha_success->success==true) {

$sendArray = array(
        'name'=>$_POST['name'],
        'tel'=>$_POST['tel'],
        'message'=>$_POST['message'],
        'date'=>date('d/m/Y H:i:s ', time())
    
    );
    $message = $modx->getChunk('emailNewRecallTpl',$sendArray);
    $managerEmail = 'MISSCHAPLIN88@yandex.ru'; 
    $modx->getService('mail', 'mail.modPHPMailer');
    $modx->mail->set(modMail::MAIL_BODY,$message);
    $modx->mail->set(modMail::MAIL_FROM,'noreply@misschaplin.ru');
    $modx->mail->set(modMail::MAIL_FROM_NAME,'WDA Email Plugin');
    $modx->mail->set(modMail::MAIL_SUBJECT,'Запрос на обратный звонок');
    $modx->mail->address('to',$managerEmail);
    $modx->mail->address('reply-to','info@xexample.org');
    $modx->mail->setHTML(true);
    if (!$modx->mail->send()) {
        $modx->log(modX::LOG_LEVEL_ERROR,'An error occurred while trying to send the email: '.$modx->mail->mailer->ErrorInfo);
    }
    $modx->mail->reset();

echo json_encode(array("code"=>1));

}
return;
