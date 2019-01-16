<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 16.01.19
 * Time: 10:18
 */

namespace vendor\libs;


class Mailer
{

    public $tpl = 'mail';
    public $to;
    public $subject;
    public $message;
    public $headers = array(
        'From' => 'admin@books.loc',
        'Reply-To' => 'admin@books.loc',
    );



    public function setMail($to, $subject, $params = [])
    {
        $this->to = form_check($to);
        $this->subject = form_check($subject);
        $this->message = $this->setMessage($params);

    }

    public function sendMail($to, $subject, $params = [])
    {
        $this->setMail($to, $subject, $params);
        mail($this->to, $this->subject, $this->message, $this->headers);
    }

    private function setMessage($params=[])
    {
        ob_start();
        require WWW . "/tpl/{$this->tpl}.php";
        return ob_get_clean();
    }
}