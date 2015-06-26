<?php namespace Jamba\Ws\Controllers;


use App\Http\Controllers\Controller;
use Jamba\Ws\Ws;

class WsController extends Controller
{
    /**
     * @var Ws
     */
    protected $ws;

    /**
     * @param Ws $ws
     */
    public function __construct(Ws $ws)
    {

        //filtro middleware
        $ws->filtroIpMiddleware($this);

        //implemento el repositorio de conexión
        $this->ws = $ws;
    }

    /**
     * Devuelve los parámetros de una consulta
     * @param $consulta
     * @param $parametro
     * @return string
     */
    public function get($consulta, $parametro)
    {
        return $this->ws->get($consulta, $parametro);
    }

}