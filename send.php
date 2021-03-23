<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$email = $_POST['email'];

if (empty($name) && empty($phone) && empty($message)){

// Формирование самого письма
$title = "Я хочу подписаться на рассылку";
$body = "
<h2>Хочу получать свежую информацию</h2>
<b>Почта:</b><br>$email
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'mail.viktory-gorbatova.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'vikky@viktory-gorbatova.ru'; // Логин на почте
    $mail->Password   = '5W4l2O4b'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('vikky@viktory-gorbatova.ru', 'vikto187'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('v-gorbatova@mail.ru');   
    $mail->addAddress('v-gorbatova@mail.ru'); 
    // Ещё один, если нужен

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');
}

else {
// Формирование самого письма
$title = "Новое обращение Best Tour Plan";
$body = "
<h2>Новое обращение</h2>
<b>Имя:</b> $name<br>
<b>Телефон:</b> $phone<br><br>
<b>Сообщение:</b><br>$message
";

// Настройки PHPMailer
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";
    $mail->SMTPAuth   = true;
    // $mail->SMTPDebug = 2;
    $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

    // Настройки вашей почты
    $mail->Host       = 'mail.viktory-gorbatova.ru'; // SMTP сервера вашей почты
    $mail->Username   = 'vikky@viktory-gorbatova.ru'; // Логин на почте
    $mail->Password   = '5W4l2O4b'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('vikky@viktory-gorbatova.ru', 'vikto187'); // Адрес самой почты и имя отправителя

    // Получатель письма
    $mail->addAddress('v-gorbatova@mail.ru');  
    $mail->addAddress('v-gorbatova@mail.ru'); 
    // Ещё один, если нужен

    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    

// Проверяем отравленность сообщения
if ($mail->send()) {$result = "success";} 
else {$result = "error";}

} catch (Exception $e) {
    $result = "error";
    $status = "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

// Отображение результата
header('Location: thankyou.html');
}



