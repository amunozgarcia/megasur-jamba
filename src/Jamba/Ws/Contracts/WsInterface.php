<?php namespace Jamba\Ws\Contracts;

interface WsInterface
{
    /**
     * @param \SoapClient $soap
     * @return mixed
     */
    public function setSoap(\SoapClient $soap);

}