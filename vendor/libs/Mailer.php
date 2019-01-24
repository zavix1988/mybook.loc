<?php
/**
 * Created by PhpStorm.
 * User: zavix
 * Date: 16.01.19
 * Time: 10:18
 */

namespace vendor\libs;


/**
 * Class Mailer
 * @package vendor\libs
 */
class Mailer
{

    /**
     * Темплейт для письма
     * @var string
     */
    public $tpl = 'mail';

    /**
     * Получатель письма
     * @var
     */
    public $to;

    /**
     * Тема письма
     * @var
     */
    public $subject;

    /**
     * Сообщение
     * @var
     */
    public $message;

    /**
     *Заголовки
     * @var array
     */
    public $headers = array(
        'From' => 'admin@books.loc',
        'Reply-To' => 'admin@books.loc',
    );


    /**
     * Формирование письма
     *
     * @param $to
     * @param $subject
     * @param array $params
     */
    public function setMail($to, $subject, $params = [])
    {
        $this->to = form_check($to);
        $this->subject = form_check($subject);
        $this->message = $this->setMessage($params);

    }

    /**
     * Отправка письма
     *
     * @param $to
     * @param $subject
     * @param array $params
     * @return bool
     */
    public function sendMail($to, $subject, $params = [])
    {
        $this->setMail($to, $subject, $params);
        return mail($this->to, $this->subject, $this->message, $this->headers);
    }

    /**
     * Формирование сообщения
     * @param array $params
     * @return false|string
     */
    private function setMessage($params=[])
    {
        ob_start();
        require WWW . "/tpl/{$this->tpl}.php";
        return ob_get_clean();
    }
}