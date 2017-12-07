<?php

return array(
    'terceros' => array(
        'defaultController' => 'compras',
        'components' => array(
            'user' => array(
                'class' => 'terceros.components.UserTercero'
            )
        ),
    ),
    'callcenter' => array(
        'defaultController' => 'admin',
        'components' => array(
            'user' => array(
                'class' => 'callcenter.components.UserOperator'
            )
        ),
        'modules' => array(
            'telefarma' => array(
                'defaultController' => 'sitio',
                'components' => array(
                    'user' => array(
                        'class' => 'callcenter.components.UserOperator'
                    ),
                    'shoppingCartVitalCall' => array(
                        'class' => 'ext.shoppingCartVitalCall.EShoppingCart',
                    ),
                )
            ),
            'vitalcall_old' => array(
                'defaultController' => 'sitio',
                'components' => array(
                    'user' => array(
                        'class' => 'callcenter.components.UserOperator'
                    )
                )
            )
        )
    ),
    'vendedor' => array(
        'defaultController' => 'sitio',
        'components' => array(
            'user' => array(
                'class' => 'vendedor.components.UserVendedor'
            ),
            'shoppingCartSalesman' => array(
                'class' => 'ext.shoppingCartSalesman.EShoppingCart',
            ),
        )
    ),
    'puntoventa' => array(
        'defaultController' => 'usuario',
        'components' => array(
            'user' => array(
                'class' => 'puntoventa.components.UserPuntoVenta'
            ),
        	'shoppingCartNationalSale' => array(
        	    'class' => 'ext.shoppingCartNationalSale.EShoppingCart',
        	),
        ),
        'modules' => array(
            'venta' => array(
                'defaultController' => 'usuario',
                'components' => array(
                    'user' => array(
                        'class' => 'puntoventa.components.UserPuntoVenta'
                    )
                ),
            	'modules' => array(
            		'entreganacional' => array(
            			'defaultController' => 'usuario',
            			'components' => array(
            					'user' => array(
            							'class' => 'puntoventa.components.UserPuntoVenta'
            					)
            			),
            		),
            		'ventaasistida' => array(
            			'defaultController' => 'usuario',
            			'components' => array(
            					'user' => array(
            							'class' => 'puntoventa.components.UserPuntoVenta'
            					)
            			),
            		)
            	),
            ),
            'subasta' => array(
                'defaultController' => 'usuario',
                'components' => array(
                    'user' => array(
                        'class' => 'puntoventa.components.UserPuntoVenta'
                    )
                )
            )
        )
    ),
    'gii' => array(
        'class' => 'system.gii.GiiModule',
        'password' => '1',
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        'ipFilters' => array(
            '127.0.0.1',
            '::1'
        )
    )
);
