<?php  namespace Jamba\Ws;

use App\Http\Controllers\Controller;

class WsConn
{

    public function filtroIp(Controller $app)
    {

        $app->middleware('Jamba\Ws\Middleware\WsMiddleware');
    }

    public function prueba()
    {
        //esto es una prueba
        return "Estoy aqui";


    }


}