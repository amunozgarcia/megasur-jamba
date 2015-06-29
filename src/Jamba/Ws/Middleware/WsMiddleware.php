<?php namespace Jamba\Ws\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class WsMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //saco el listado de ip's con acceso
        $secure = config('ws.secure');
        //compruebo si la ip de la consulta esta en la lista de acceso
        if(!in_array(Request::getClientIp(), $secure))
        {
            //busqueda por Rangos de IP
            foreach($secure as $a)
            {
                //limpio el caracter * para hacer las comparaciones por rango de ip
                $a = str_replace("*","",$a);
                //compruebo si el rango es igual
                if ($a == substr(Request::getClientIp(), 0, strlen($a)))
                {
                    return $next($request);
                }

            }

            //si no estoy en la lista de ip compruebo si es ejecutada la consulta con el dominio
            if (!empty($_SERVER['HTTP_REFERER']))
            {
                //si el dominio viene en la lista de seguros dejo pasar la consulta
                if(in_array(getdomain($_SERVER['HTTP_REFERER']), $secure))
                {
                    return $next($request);
                }
            }

            //pinto error 500 (acceso denegado)
            return response("Acceso denegado ".Request::getClientIp(), 500);
        }

        return $next($request);
    }
}