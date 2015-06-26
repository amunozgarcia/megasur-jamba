<?php namespace Jamba\Ws\Contracts;


abstract class WsInjectRepoAbstract implements WsInterface
{

    /**
     * @var
     */
    protected $soap;

    /**
     * @param \SoapClient $soap
     * @return mixed
     */
    public function setSoap(\SoapClient $soap)
    {
        $this->soap = $soap;
    }
}