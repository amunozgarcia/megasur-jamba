<?php

if (!function_exists('getdomain')) {

    /**
     * @param $url
     * @return string
     */
    function getdomain($url)
    {
        $components = parse_url($url);
        preg_match('/\.([^\/]+)/', $components['host'], $domain);
        return strtolower($domain[1]);
    }
}

if (!function_exists('ws')) {

    /**
     * Conexión y consulta al webservice establecido en la configuración
     * @param $cond
     * @param array $param
     * @return mixed
     */
    function ws($cond, $param)
    {
        return app()->make('Jamba\Ws\Facade\Ws')->get($cond, $param);
    }
}


if (!function_exists('ws_middleware_filter_ip')) {

    /**
     * Conexión y consulta al webservice establecido en la configuración
     * @param $cond
     * @param array $param
     * @return mixed
     */
    function ws_middleware_filter_ip(\App\Http\Controllers\Controller $app)
    {
        return app()->make('Jamba\Ws\Facade\Ws')->filtroIpMiddleware($app);
    }
}

if (!function_exists('ws_get_error')) {

    /**
     * Devuelve la descripción del ultimo error
     * @return boolean mixed
     */
    function ws_get_error()
    {
        return app()->make('Jamba\Ws\Facade\Ws')->getError();
    }
}

if (!function_exists('ws_is_error')) {

    /**
     * Devuelve si la ultima consulta contiene un error
     * @return boolean mixed
     */
    function ws_is_error()
    {
        return (bool) app()->make('Jamba\Ws\Facade\Ws')->isError();
    }
}

if (!function_exists('ws_filter')) {

    /**
     * Filtro WS
     * @param $filter
     * @param $data
     * @return mixed
     */
    function ws_filter($filter, $data)
    {
        return app()->make('Jamba\Ws\Facade\Ws')->filter($filter, $data);
    }
}