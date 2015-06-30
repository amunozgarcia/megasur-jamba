<?php namespace Jamba\Flash;


use Illuminate\Session\Store;
use Jamba\Flash\Contracts\SessionStoreInterface;

class LaravelSessionStore implements SessionStoreInterface
{

    /**
     * @var Store
     */
    private $session;
    /**
     * @param Store $session
     */
    function __construct(Store $session)
    {
        $this->session = $session;
    }
    /**
     * Flash a message to the session.
     *
     * @param $name
     * @param $data
     */
    public function flash($name, $data)
    {
        $this->session->flash($name, $data);
    }
}