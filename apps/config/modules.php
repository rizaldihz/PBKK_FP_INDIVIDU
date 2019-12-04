<?php

return array(
    'dashboard' => [
        'namespace' => 'MyModule\Dashboard',
        'webControllerNamespace' => 'MyModule\Dashboard\Controllers\Web',
        'apiControllerNamespace' => 'MyModule\Dashboard\Controllers\Api',
        'className' => 'MyModule\Dashboard\Module',
        'path' => APP_PATH . '/modules/dashboard/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'dashboard',
        'defaultAction' => 'index'
    ],

    'backoffice' => [
        'namespace' => 'MyModule\BackOffice',
        'webControllerNamespace' => 'MyModule\BackOffice\Controllers\Web',
        'apiControllerNamespace' => 'MyModule\BackOffice\Controllers\Api',
        'className' => 'MyModule\BackOffice\Module',
        'path' => APP_PATH . '/modules/backoffice/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'index',
        'defaultAction' => 'index'
    ],
    'authentication' => [
        'namespace' => 'MyModule\Auth',
        'webControllerNamespace' => 'MyModule\Auth\Controllers\Web',
        'apiControllerNamespace' => 'MyModule\Auth\Controllers\Api',
        'className' => 'MyModule\Auth\Module',
        'path' => APP_PATH . '/modules/authentication/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'authentication',
        'defaultAction' => 'index'
    ],
    'administrator' => [
        'namespace' => 'MyModule\Admin',
        'webControllerNamespace' => 'MyModule\Admin\Controllers\Web',
        'apiControllerNamespace' => 'MyModule\Admin\Controllers\Api',
        'className' => 'MyModule\Admin\Module',
        'path' => APP_PATH . '/modules/administrator/Module.php',
        'defaultRouting' => true,
        'defaultController' => 'administrator',
        'defaultAction' => 'index'
    ],
);