<?php

return array(
    'urlFormat' => 'path',
    'showScriptName' => false,
    'caseSensitive' => true,
    'rules' => array(
        /* 'post/<id:\d+>/<title:.*?>'=>'post/view',
          'posts/<tag:.*?>'=>'post/index', */
        
        // Links de campañias
        'atacadol-alivio-dolores-fuertes' => 'publicidad/contenido/nombre/atacadol-alivio-dolores-fuertes',
        'coca-cola-sabores' => 'publicidad/contenido/nombre/coca-cola-sabores',
        'corega' => 'publicidad/contenido/nombre/corega',
        'klim-fortigrow' => 'publicidad/contenido/nombre/klim-fortigrow',
        'klim1-fortiprotect' => 'publicidad/contenido/nombre/leche-klim-1',
        'listerine-cuidado-total' => 'publicidad/contenido/nombre/listerine-cuidado-total',
        'mas-informacion-metamucil' => 'publicidad/contenido/nombre/mas-informacion-metamucil',
        'mas-informacion-nan' => 'publicidad/contenido/nombre/mas-informacion-nan',
        'metamucil-facilita-transito-intestinal' => 'publicidad/contenido/nombre/metamucil-facilita-transito-intestinal',
        'nan-recetas' => 'publicidad/contenido/nombre/nan-recetas',
        'nestle-nan-optipro' => 'publicidad/contenido/nombre/nestle-nan-optipro',
        'parodontax' => 'publicidad/contenido/nombre/parodontax',
        'porque-elejir-metamucil' => 'publicidad/contenido/nombre/porque-elejir-metamucil',
        'prebioticos-klim' => 'publicidad/contenido/nombre/prebioticos-klim',
        'prohelix' => 'publicidad/contenido/nombre/prohelix',
        'sensodyne' => 'publicidad/contenido/nombre/sensodyne',
        'sobre-metamucil' => 'publicidad/contenido/nombre/sobre-metamucil',
        'recetas-nestle-nan-optipro' => 'publicidad/contenido/nombre/nan-recetas',
        'perros-y-gatos' => 'publicidad/contenido/nombre/perros-y-gatos',
        'muestra-gratis-perros-y-gatos' => 'publicidad/contenido/nombre/perros-y-gatos-formulario',
        'proteccion-solar-sol-or' => 'publicidad/contenido/nombre/sol-or',
        'shampoo-clinical-solution-caspa-severa' => 'publicidad/contenido/nombre/pyg',
        'similac-mama-embarazo' => 'publicidad/contenido/nombre/similac-mama',
        'similac-3kid' => 'publicidad/contenido/nombre/similac-3-kid',
        'pediasure' => 'publicidad/contenido/nombre/pediasure',
        'ensure-nutricion-especializada' => 'publicidad/contenido/nombre/ensure',
        'glucerna-para-diabeticos' => 'publicidad/contenido/nombre/glucerna',
        'zahara-protector-solar' => 'publicidad/contenido/nombre/zahara',
        'prodent-cuidado-oral' => 'publicidad/contenido/nombre/prodent',
        'pedialyte-suero-oral' => 'publicidad/contenido/nombre/pedialyte',
        'pilas-energizer' => 'publicidad/contenido/nombre/energizer',
        // Fin links campañas
        // REST patterns
        array('restProducto/producto', 'pattern' => 'rest/producto/<codigoProducto:\d+>/ciudad/<codigoCiudad:\d+>/sector/<codigoSector:\d+>', 'verb' => 'GET'),
        array('restCiudad/list', 'pattern' => 'rest/ciudad', 'verb' => 'GET'),
        array('restCiudad/view', 'pattern' => 'rest/ciudad/<id:\d+>', 'verb' => 'GET'),
        array('restPuntoVenta/puntoventacercano', 'pattern' => 'rest/puntoventacercano/lat/<lat:\-?\d+\.?\d+>/lon/<lon:\-?\d+\.?\d+>', 'verb' => 'GET'),
        array('restCiudad/sectores', 'pattern' => 'rest/ciudad/<id:\d+>/sectores', 'verb' => 'GET'),
        array('restPuntoVenta/list', 'pattern' => 'rest/puntoventa', 'verb' => 'GET'),
        array('restProducto/list', 'pattern' => 'rest/producto', 'verb' => 'GET'),
        array('restProducto/buscar', 'pattern' => 'rest/producto/buscar/<termino:.*>/<laboratorio:\-?\d+>', 'verb' => 'GET'),
        array('restProducto/simular', 'pattern' => 'rest/producto/simular', 'verb' => 'GET' ),
        array('restProfesion/ver', 'pattern' => 'rest/profesion/ver/<id:\d+>', 'verb' => 'GET'),
        array('restProfesion/listar', 'pattern' => 'rest/profesion', 'verb' => 'GET'),
    /* array('rest/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
      array('rest/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
      array('rest/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'), */
    // Other controllers
    // '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
    )
);
