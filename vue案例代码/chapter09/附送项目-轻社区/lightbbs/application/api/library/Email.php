<?php
namespace app\api\library;

use PHPMailer\PHPMailer\PHPMailer;
use think\Facade\Config;

class Email
{
    protected $config;

    public function __construct()
    {
        $this->config = Config::get('lightbbs.email');
    }

    public function sendEmail($address, $name = '', $subject = '', $body = '')
    {
        $mail = new PHPMailer();        // 实例化PHPMailer对象
        $mail->CharSet = 'UTF-8';       // 设定邮件编码
        $mail->isSMTP();                // 设定使用SMTP服务
        $mail->SMTPAuth = $this->config['SMTPAuth'];        // 启用SMTP验证功能
        $mail->SMTPSecure = $this->config['SMTPSecure'];    // 使用安全协议
        $mail->Host = $this->config['Host'];                // SMTP服务器
        $mail->Port = $this->config['Port'];                // SMTP服务器的端口号
        $mail->Username = $this->config['Username'];        // SMTP服务器用户名
        $mail->Password = $this->config['Password'];        // SMTP服务器密码
        $mail->SetFrom($mail->Username, $this->config['Name']);  // 设置发件人信息
        $replyEmail = '';                           // 留空则为发件人EMAIL
        $replyName = '';                            // 回复名称（留空则为发件人名称）
        $mail->AddReplyTo($replyEmail, $replyName); // 设置回复人信息，指的是收件人收到邮件后，如果要回复，回复邮件将发送到的邮箱地址
        $mail->Subject = $subject;                  // 邮件标题
        $mail->MsgHTML($body);                      // 邮件正文
        $mail->AddAddress($address, $name);         // 设置收件人信息
        return $mail->Send() ? true : $mail->ErrorInfo;
    }
}
