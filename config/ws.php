<?php

return [

    /*
    | ---------------------
    | Nombre del servicio WS
    | ----------------------
    */
    'service' => 'gestion',

    /*
    | ---------------------
    | Timeout conexión ws
    | ----------------------
    */
    'connection_timeout' => 20,

    /*
    | ---------------------
    | return trace consulta
    | ----------------------
    */
    'trace' => 1,

    /*
    | ---------------------
    | Compresion consulta
    | ----------------------
    */
    'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP,

    /*
    | ---------------------
    | Secure
    | ----------------------
    | Configuración de ip's de seguridad para restringir el acceso
    | a las peticiones webservice mediante URL POST.
    */
    'secure' => [
        '37.130.146.144',
        '150.150.2.52',
        'tuaccesouno.es',
        'dev'
    ],
    /*
    |--------------------------------------------------------------------------
    | Servidores WS
    |--------------------------------------------------------------------------
    |
    | Configuración de los servidores para hacer las consultas WS, se tiene que
    | añadir el nombre del servicio que queremos usar para poder hacer la conexión
    |
    */
    'services' => [
        'gestion' => [
            'host' => 'gestion.megasur.es',
            'wsdl' => 'https://gestion.megasur.es/webservice/wsdl.server.php?wsdl',
            'port' => '80'
        ],

        'central' => [
            'host' => 'externa.megasur.es',
            'wsdl' => 'http://externa.megasur.es:7791/MegasurWebService?wsdl',
            'port' => '7791'
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Filtros
    |--------------------------------------------------------------------------
    |
    | Configuración de los filtros que retorna una consulta ws
    | eliminamos dentro de la consulta los parametros para hacer limpieza
    |
    */
    'filter' => [
        'customer_delivery_place'   => ['customer_delivery_placeResult', 'customer_delivery_place_info'],
        'add_customer'              => ['add_customerResult']
    ],


];