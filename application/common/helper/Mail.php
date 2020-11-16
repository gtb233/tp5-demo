<?php
/**
 * 邮件发送类
 * 基于 phpmailer 扩展包
 */
namespace app\common\helper;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use think\facade\Env;

class Mail
{
    private $_mail;

    protected $_charset = 'UTF-8';

    const FROM_ADDR = '632605691@qq.com';
    const FROM_NAME = 'gtb';

    public function __construct()
    {
        $this->_mail = new PHPMailer();
        $this->_mail->CharSet = $this->_charset;    //设定邮件编码，默认ISO-8859-1，如果发中文此项必须设置，否则乱码
        $this->_mail->IsSMTP();                       // 设定使用SMTP服务
        $this->_mail->SMTPDebug = Env::get('SMTPDebug', '0');   // SMTP调试功能 0=关闭 1 = 错误和消息 2 = 消息
        $this->_mail->SMTPAuth = Env::get('SMTPAuth', true);    // 启用 SMTP 验证功能
        $this->_mail->SMTPSecure = Env::get('SMTPSecure', 'ssl');  // 使用安全协议
        $this->_mail->Host = Env::get('host', ''); // SMTP 服务器
        $this->_mail->Port = Env::get('port', '465'); // SMTP服务器的端口号
        $this->_mail->Username = Env::get('username', '');     // SMTP服务器用户名
        $this->_mail->Password = Env::get('password', '');     // SMTP服务器密码
        $this->_mail->SetFrom(Mail::FROM_ADDR, Mail::FROM_NAME);
    }

    /**
     * 系统邮件发送函数
     * @param string $tomail 接收邮件者邮箱
     * @param string $name 接收邮件者名称
     * @param string $subject 邮件主题
     * @param string $body 邮件内容
     * @param string $attachment 附件列表
     * @return boolean
     */
    public function sendMail($toMail, $name, $subject = '', $body = '', $attachment = null)
    {
        try{
            $replyEmail = '';                   //留空则为发件人EMAIL
            $replyName = '';                    //回复名称（留空则为发件人名称）
            $this->_mail->AddReplyTo($replyEmail, $replyName);
            $this->_mail->Subject = $subject;
            $this->_mail->MsgHTML($body);
            $this->_mail->AddAddress($toMail, $name);
            if (is_array($attachment)) { // 添加附件
                foreach ($attachment as $file) {
                    is_file($file) && $this->_mail->AddAttachment($file);
                }
            }
            return $this->_mail->Send() ? true : $this->_mail->ErrorInfo ;
        }catch (Exception $e) {
            return $this->_mail->ErrorInfo;
        }
    }
}