<?php

$config = [
    'id' => 'tanks-web',
    'components' => [
        'request' => [
            'cookieValidationKey' => 'kw11HC14ar0Cz9A4Jl9jmNNZd6rxmdBx'
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => []
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => yii\debug\Module::class
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class
    ];
}

return $config;
