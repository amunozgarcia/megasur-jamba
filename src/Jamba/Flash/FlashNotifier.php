<?php
/**
 * Created by PhpStorm.
 * User: aure
 * Date: 29/06/2015
 * Time: 18:22
 */

namespace Jamba\Flash;


use Jamba\Flash\Contracts\SessionStoreInterface;

class FlashNotifier
{

    /**
     * The session writer.
     *
     * @var SessionStore
     */
    private $session;
    /**
     * Create a new flash notifier instance.
     *
     * @param SessionStore $session
     */
    function __construct(SessionStoreInterface $session)
    {
        $this->session = $session;
    }
    /**
     * Flash an information message.
     *
     * @param string $message
     */
    public function info($message)
    {
        $this->message($message, 'info');
        return $this;
    }
    /**
     * Flash a success message.
     *
     * @param  string $message
     * @return $this
     */
    public function success($message)
    {
        $this->message($message, 'success');
        return $this;
    }
    /**
     * Flash an error message.
     *
     * @param  string $message
     * @return $this
     */
    public function error($message)
    {
        $this->message($message, 'danger');
        return $this;
    }
    /**
     * Flash a warning message.
     *
     * @param  string $message
     * @return $this
     */
    public function warning($message)
    {
        $this->message($message, 'warning');
        return $this;
    }
    /**
     * Flash an overlay modal.
     *
     * @param  string $message
     * @param  string $title
     * @return $this
     */
    public function overlay($message, $title = 'Notice')
    {
        $this->message($message, 'info', $title);
        $this->session->flash('flash_notification.overlay', true);
        $this->session->flash('flash_notification.title', $title);
        return $this;
    }


    /**
     * @param string $title
     * @param $message
     * @param string $type
     * @param bool $keepOpen
     * @return $this
     */
    public function alert($title = 'success', $message, $type='', $keepOpen=false)
    {
        $this->message($message, $type, $title);
        $this->session->flash('flash_notification.keepOpen', $keepOpen);
        $this->session->flash('flash_notification.alert', true);
        $this->session->flash('flash_notification.title', $title);

        return $this;
    }


    /**
     * Flash a general message.
     *
     * @param  string $message
     * @param  string $level
     * @return $this
     */
    public function message($message, $level = 'info')
    {
        $this->session->flash('flash_notification.message', $message);
        $this->session->flash('flash_notification.level', $level);
        return $this;
    }
    /**
     * Add an "important" flash to the session.
     *
     * @return $this
     */
    public function important()
    {
        $this->session->flash('flash_notification.important', true);
        return $this;
    }

}