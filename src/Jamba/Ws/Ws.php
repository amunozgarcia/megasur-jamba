<?php namespace Jamba\Ws;


use App\Http\Controllers\Controller;

class Ws {

    private $repository;
    private $soap;
    private $isError;
    private $msgError;
    private $filter;
    private $config;


    public function __construct()
    {
        //
        $this->config = config('ws');
        //injección filtros de consultas
        $this->filter = $this->config['filter'];
        //conectamos al webservice
        $this->connect();
    }

    /**
     * Conexión al servidor
     */
    private function connect()
    {
        //reseteo
        $this->msgError = "";
        //
        $nameservicio   = config('ws.service');
        $srv            = $this->config['services'][$nameservicio];
        //
        if (!empty($srv))
        {
            if ($fp=@fsockopen($srv['host'], $srv['port'], $error_no, $error_msg, (float)0.5))
            {
                //excepción para la conexión SOAP
                try {
                    //conexión SOAP
                    $this->soap = new \SoapClient($srv['wsdl'],
                        array(
                            'trace' 				=> $this->config['trace'],
                            'connection_timeout'	=> $this->config['connection_timeout'],
                            'compression'			=> $this->config['compression']
                        )
                    );


                } catch (\SoapFault $e) {
                    $this->msgError = trans('megasur::ws.errors.soapfault',['consult' => 'soapclient', 'parametro' => $srv['wsdl'], 'msgerror' => $e->getMessage() ]);
                    $this->soap     = null;
                    $this->isError  = true;
                }
            }
            else {
                $this->msgError = trans('megasur::ws.errors.sock',['msgerror' => $error_msg]);
                $this->soap     = null;
                $this->isError  = true;
                return false;
            }
        }
    }

    /**
     * @param $consulta
     * @param $parametro
     * @return string
     */
    public function get($consulta, $parametro)
    {
        //controlo si hay algun error de conexión
        if ($this->isError())
        {
            return false;
        }

        //controlo si hay conexión
        if (!$this->soap)
        {
            $this->msgError = trans('megasur::ws.errors.soap',['msgerror' => '']);

            $this->isError = true;

            return false;
        }

        //reseteo
        $this->msgError = "";
        $this->isError = false;

        //compruebo si existe el metodo en el repositorio WS
        if (method_exists($this, $consulta))
        {
            //hago la consulta al repositorio inyectado
            $data = $this -> $consulta($parametro);
            //muestro el error
            if (!$data)
            {
                $this->msgError = trans('megasur::ws.errors.general',['consult' => $consulta, 'parametro' => $parametro]);
                $this->isError = true;
                return false;
            }

            return $data;
        }

        try {

            //si el parametro es un string lo convierto en un array
            if (!is_array($parametro)) $parametro = [$parametro];

            //si no existe el metodo llamo directamente al webservice
            //$data = $this->soap->$consulta($parametro);
            $data = call_user_func_array(array($this->soap, $consulta), $parametro);

            //compruebo si viene algun filtro
            $data = $this->filter($consulta, $data);
            //
            return $data;
        }
        catch(\SoapFault $e) {
            $this->msgError = trans('megasur::ws.errors.soapfault',['consult' => $consulta, 'parametro' => print_r($parametro,true), 'msgerror' => $e->getMessage() ]);
            $this->isError = true;
            return false;
        }

    }

    /**
     * Filtro de respuesta ws para hacer limpieza (object)
     * @param $consulta
     * @param $data
     * @return mixed
     */
    public function filter($consulta, $data)
    {
        if (!empty($this -> filter[$consulta]))
        {
            //recorro los filtros
            foreach($this->filter[$consulta] as $a)
            {
                // entro en los objetos
                if (!empty($data->$a))
                    $data = $data -> $a;
            }
        }

        return $data;
    }

    //
    // UTILS
    //

    /**
     * Middleware para contrololar el filtro por IP
     * @param Controller $app
     */
    public function filtroIpMiddleware(Controller $app)
    {
        //Filtro dentro de un controlador
        $app->middleware('Jamba\Ws\Middleware\WsMiddleware');
    }

    /**
     * @return string
     */
    public function prueba()
    {
        //esto es una prueba
        return "Estoy aqui";
    }

    //
    // GETS
    //

    /**
     * Devuelve la conexión SOAP
     * @return null
     */
    public function soap()
    {
        return $this->soap;
    }

    /**
     * Devuelve si hay error en la ultima conexión
     * @return bool
     */
    public function isError()
    {
        return $this->isError;
    }

    /**
     * Devuelve el mensaje de error detallado
     * @return mixed
     */
    public function getError()
    {
        return $this->msgError;
    }



}