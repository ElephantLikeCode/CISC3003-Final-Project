<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "PHPMailer/src/Exception.php";
require "PHPMailer/src/SMTP.php";
require "PHPMailer/src/PHPMailer.php";

$sendresult=0;

if($_POST["Email"]==""||$_POST["Password"]==""||$_POST["User"]==""){
    $sendresult = 1;
    echo json_encode(['sendresult' => $sendresult]);
    exit();
}

if (!filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {
    $sendresult = 2;
    echo json_encode(['sendresult' => $sendresult]);
    exit();
}
// 设置发件人信息
$senderEmail = '1443387396@qq.com';
$senderName = 'Elephant_club';

// 设置收件人信息
$recipientEmail = $_POST["Email"];
$recipientName = $_POST["User"];


// 设置邮件主题和内容
$subject = 'Verification Code';
$randomCode = mt_rand(100000, 999999); // Generate a random 6-digit code
$body = "Your verification code is:" . $randomCode;

// 设置 SMTP 服务器信息
$smtpHost = 'smtp.qq.com';
$smtpPort = 465;
$smtpUsername = '1443387396@qq.com';
$smtpPassword = 'hihhofweglniiegi';

// 创建邮件对象
$mail = new PHPMailer();

// 设置 SMTP 服务器
$mail->CharSet = 'UTF-8';
$mail->isSMTP();
$mail->Host = $smtpHost;
$mail->Port = $smtpPort;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = $smtpUsername;
$mail->Password = $smtpPassword;

// 设置发件人信息
$mail->setFrom($senderEmail, $senderName);

// 设置收件人信息
$mail->addAddress($recipientEmail, $recipientName);

// 设置邮件主题和内容
$mail->Subject = $subject;
$mail->Body = $body;

// 发送邮件
$mail->send();

echo json_encode(['sendresult' => $sendresult]);

session_start();

$_SESSION['vt'] = $randomCode;

?>

