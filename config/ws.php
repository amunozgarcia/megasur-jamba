<?php

return [

    /*
    | ---------------------
    | Nombre del servicio WS
    | ----------------------
    */
    'service' => 'central',

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
    | Repositorio
    | ----------------------
    | Injección de clases para poder usar las funciones en un controlador con el comando Ws:: o WS()
    |
    */
    'repositories' => '',

    /*
    | ---------------------
    | Secure
    | ----------------------
    | Configuración de ip's de seguridad para restringir el acceso
    | a las peticiones webservice mediante URL POST.
    | Activada la opción de rangos de ip delimitando el rago con el simbolo (*)
    | ejemplo: 150.150.*
    */
    'secure' => [
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
        'customer_delivery_place'       => ['customer_delivery_placeResult', 'customer_delivery_place_info'],
        'add_customer'                  => ['add_customerResult'],
        'order_esc'					    => ['order_escResult'],
        'add_customer_delivery_place'   => ['add_customer_delivery_placeResult']
    ]

];