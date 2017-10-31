<?php

return array(
    // uncomment the following to enable the Gii tool
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
            )
        ),
        'modules' => array(
            'entreganacional' => array(
                'defaultController' => 'usuario',
                'components' => array(
                    'user' => array(
                        'class' => 'puntoventa.components.UserPuntoVenta'
                    )
                )
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
