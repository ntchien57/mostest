<?php

return [

    /*
     * Laravel-admin name.
     */
    'name'          => 'Hệ thống quản trị',

    /*
     * Logo in admin panel header.
     */
    'logo'          => '<b>MOS Test</b>',

    /*
     * Mini-logo in admin panel header.
     */
    'logo-mini'     => '<b>MOS</b>',

    /*
     * Route configuration.
     */
    'route'         => [

        'prefix'     => 'admin',

        'namespace'  => 'App\\Admin\\Controllers',

        'middleware' => ['web', 'admin'],
    ],

    /*
     * Laravel-admin install directory.
     */
    'directory'     => app_path('Admin'),

    /*
     * Laravel-admin html title.
     */
    'title'         => 'MOSTEST Admin',

    /*
     * Use `https`.
     */
    'secure'        => false,

    /*
     * Laravel-admin auth setting.
     */
    'auth'          => [
        'guards'    => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Encore\Admin\Auth\Database\Administrator::class,
            ],
        ],

        // Add "remember me" to login form
        'remember' => true,

        // Redirect to the specified URI when user is not authorized.
        'redirect_to' => 'auth/login',

        // The URIs that should be excluded from authorization.
        'excepts' => [
            'auth/login',
            'auth/logout',
        ]
    ],

    /*
     * Laravel-admin upload setting.
     */
    'upload'        => [

        'disk'      => 'admin',

        'directory' => [
            'image' => 'images',
            'file'  => 'files',
        ],
    ],

    /*
     * Laravel-admin database setting.
     */
    'database'      => [

        // Database connection for following tables.
        'connection'             => '',

        // User tables and model.
        'users_table'            => 'admin_users',
        'users_model'            => Encore\Admin\Auth\Database\Administrator::class,

        // Role table and model.
        'roles_table'            => 'admin_roles',
        'roles_model'            => Encore\Admin\Auth\Database\Role::class,

        // Permission table and model.
        'permissions_table'      => 'admin_permissions',
        'permissions_model'      => Encore\Admin\Auth\Database\Permission::class,

        // Menu table and model.
        'menu_table'             => 'admin_menu',
        'menu_model'             => Encore\Admin\Auth\Database\Menu::class,

        // Pivot table for table above.
        'operation_log_table'    => 'admin_operation_log',
        'user_permissions_table' => 'admin_user_permissions',
        'role_users_table'       => 'admin_role_users',
        'role_permissions_table' => 'admin_role_permissions',
        'role_menu_table'        => 'admin_role_menu',
    ],

    /*
     * By setting this option to open or close operation log in laravel-admin.
     */
    'operation_log' => [

        'enable' => false,

        /*
         * Routes that will not log to database.
         *
         * All method to path like: admin/auth/logs
         * or specific method to path like: get:admin/auth/logs
         */
        'except' => [
            'admin/auth/logs*',
        ],
    ],

    /*
     * @see https://adminlte.io/docs/2.4/layout
     */
    'skin'          => 'skin-blue',

    /*
    |---------------------------------------------------------|
    |LAYOUT OPTIONS | fixed                                   |
    |               | layout-boxed                            |
    |               | layout-top-nav                          |
    |               | sidebar-collapse                        |
    |               | sidebar-mini                            |
    |---------------------------------------------------------|
     */
    'layout'        => ['sidebar-mini'],

    /*
     * Version displayed in footer.
     */
    'version'       => '1.5.x-dev',

    /*
     * Settings for extensions.
     */
    'extensions'    => [

    ],
];
