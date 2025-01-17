<?php
/**
 * Yii Application Config
 *
 * Edit this file at your own risk!
 *
 * The array returned by this file will get merged with
 * vendor/craftcms/cms/src/config/app/main.php and [web|console].php, when
 * Craft's bootstrap script is defining the configuration for the entire
 * application.
 *
 * You can define custom modules and system components, and even override the
 * built-in system components.
 */

return [
    'modules' => [
        'my-module' => \modules\Module::class,
    ],

    '*' => [
        'components' => [
            'redis' => [
                'class' => yii\redis\Connection::class,
                'hostname' => 'redis',
                'port' => 6379
            ],
            'cache' => [
                'class' => yii\redis\Cache::class,
                'defaultDuration' => 86400,
            ],
            'session' => [
                'class' => yii\redis\Session::class,
                'as session' => craft\behaviors\SessionBehavior::class,
            ]
        ]
    ],

    'dev' => [
        'components' => [
            'mailer' => function() {
                // Get the stored email settings
                $settings = craft\helpers\App::mailSettings();

                // Override the transport adapter class
                $settings->transportType = craft\mail\transportadapters\Smtp::class;

                // Override the transport adapter settings
                $settings->transportSettings = [
                    'host' => 'mailhog',
                    'port' => '1025',
                    'useAuthentication' => true,
                    'username' => 'mailhog',
                    'password' => 'mailhog'
                ];

                // Create a Mailer component config with these settings
                $config = craft\helpers\App::mailerConfig($settings);

                // Instantiate and return it
                return Craft::createObject($config);
            }
        ]
    ]
];
