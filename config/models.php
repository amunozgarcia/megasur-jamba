<?php
return [

    /*
    | ELOQUENT PRODUCTS
    | .....................
    | Configuración eloquent para cargar en el fichero ModelBase
    |
    */
    'product' => [
        'table'             => 'articulos',
        'primaryKey'        => 'AR_COD_ARTICULO',
        'fillable'          => [],
        'hidden'            => [],
        'timestamps'        => false,
        'dateFormat'        => ''
    ],

    'product_quality' => [

        'table'             => 'articulos_cualidades',
        'primaryKey'        => 'AC_COD_ARTICULO',
        'fillable'          => ['AC_COD_CUALIDAD','AC_VALOR'],
        'hidden'            => [],
        'timestamps'        => false,
        'dateFormat'        => ''
    ],

    'quality' => [

        'table'             => 'cualidades',
        'primaryKey'        => 'CU_COD_CUALIDAD',
        'fillable'          => ['CU_COD_CUALIDAD'],
        'hidden'            => [],
        'timestamps'        => false,
        'dateFormat'        => ''
    ],

    'quality_opc' => [

        'table'             => 'cualidades_opc',
        'primaryKey'        => 'CSF_COD_CUALIDAD',
        'fillable'          => [],
        'hidden'            => [],
        'timestamps'        => false,
        'dateFormat'        => ''
    ],

    'quality_valor' => [

        'table'             => 'cualidades_valor',
        'primaryKey'        => 'CV_ID_VALOR',
        'fillable'          => ['CV_ID_VALOR','CV_NONMBRE_VALOR'],
        'hidden'            => [],
        'timestamps'        => false,
        'dateFormat'        => ''
    ],


    /*
    | ELOQUENT CUALIDADES
    | .....................
    | Configuración eloquent para cargar en el fichero ModelBase
    |
    */
    'cualidadex' => [

        'articulos_cualidades' => [

            'table'             => 'articulos_cualidades',
            'primaryKey'        => 'AC_COD_ARTICULO',
            'fillable'          => ['AC_COD_CUALIDAD','AC_VALOR'],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ],
        'cualidades' => [

            'table'             => 'cualidades',
            'primaryKey'        => 'CU_COD_CUALIDAD',
            'fillable'          => ['CU_COD_CUALIDAD'],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ],
        'cualidades_opc' => [

            'table'             => 'cualidades_opc',
            'primaryKey'        => 'CSF_COD_CUALIDAD',
            'fillable'          => [],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ],
        'cualidades_valor' => [

            'table'             => 'cualidades_valor',
            'primaryKey'        => 'CSF_COD_CUALIDAD',
            'fillable'          => [],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ]
    ],
    'categories' => [
        [
            'table'             => 'familia',
            'primaryKey'        => 'F_ID',
            'fillable'          => [],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ],
        [
            'table'             => 'subfamilia',
            'primaryKey'        => 'SF_ID',
            'fillable'          => [],
            'hidden'            => [],
            'timestamps'        => false,
            'dateFormat'        => ''
        ],
    ]
];