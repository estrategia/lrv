
* Copiar/reemplazar solo archivos que estan en la carpeta:
/protected/views/campania/

* Copiar/reemplazar toda la carpeta:
/images/contenido/listerine

* protected/config/main.php reemplazar toda la variable urlManager por:

        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
            'rules'=>array(
                /*'post/<id:\d+>/<title:.*?>'=>'post/view',
                'posts/<tag:.*?>'=>'post/index',*/
                // REST patterns

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

                // Fin links campañas

                array('restciudad/list', 'pattern'=>'rest/ciudad', 'verb'=>'GET'),
                array('restciudad/view', 'pattern'=>'rest/ciudad/<id:\d+>', 'verb'=>'GET'),
                array('restpuntoventa/puntoventacercano', 'pattern'=>'rest/puntoventacercano/lat/<lat:\-?\d+\.?\d+>/lon/<lon:\-?\d+\.?\d+>', 'verb'=>'GET'),
                array('restciudad/sectores', 'pattern' => 'rest/ciudad/<id:\d+>/sectores', 'verb' => 'GET'),
                array('restpuntoventa/list', 'pattern'=>'rest/puntoventa', 'verb'=>'GET'),
                array('restproducto/list', 'pattern'=>'rest/producto', 'verb'=>'GET'),
                array('restproducto/buscar', 'pattern'=>'rest/producto/buscar/<termino:.*>/<laboratorio:\-?\d+>', 'verb'=>'GET'),
                array('restproducto/producto',
                    'pattern' => 'rest/producto/<codigoProducto:\d+>/ciudad/<codigoCiudad:\d+>/sector/<codigoSector:\d+>',
                    'verb'=>'GET'),
                array('restproducto/simular', 'pattern' => 'rest/producto/simular', 'verb' => 'GET'),
                array('restprofesion/ver', 'pattern' => 'rest/profesion/ver/<id:\d+>', 'verb' => 'GET'),
                array('restprofesion/listar', 'pattern' => 'rest/profesion', 'verb' => 'GET'),
               /* array('rest/update', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'PUT'),
                array('rest/delete', 'pattern'=>'api/<model:\w+>/<id:\d+>', 'verb'=>'DELETE'),
                array('rest/create', 'pattern'=>'api/<model:\w+>', 'verb'=>'POST'),*/
                // Other controllers
                // '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
