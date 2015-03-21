<?php
/**
 * voltdb  configure
 * @package Ytake\LaravelVoltDB
 * @author yuuki.takezawa<yuuki.takezawa@comnect.jp.net>
 * @license http://opensource.org/licenses/MIT MIT
 */
return [

    // json interface api configure
    /** voltdb server */
    'host' => "localhost",
    /** api path */
    'path' => "/api/1.0/",
    /** json interface port */
    'apiPort' => 8080,
    /** ssl access */
    'ssl' => false,

    /** default configure */
    'default' => [
        // auth 'voltdb' driver configure
        'auth' => [
            // use auth database connection name, see database.php
            'database' => 'voltdb',

            'column_name' => [
                'id' => 'USER_ID',
                'password' => 'PASSWORD',
                'remember_token' => 'REMEMBER_TOKEN'
            ],
            /** default auth procedure */
            'procedure' => [
                'findUser' => "Auth_findUser",
                'remember_token' => "Auth_rememberToken",
                'update_token' => "Auth_updateToken",
            ],
        ],
        'system' => [
            // for system catalog, see database.php
            'database' => 'voltdb',
        ],

        // cache 'voltdb' driver configure
        'cache' => [
            // use cache database connection name, see database.php
            'database' => 'voltdb',
            /** default cache procedure */
            'procedure' => [
                'flushAll' => "Cache_flushAll",
                'forget' => "Cache_forget",
                'update' => "Cache_update",
                'add' => "Cache_add",
                'find' => "Cache_find",
            ],
        ],

        // session 'voltdb' driver configure
        'session' => [
            // use cache database connection name, see database.php
            'database' => 'voltdb',
            /** default session procedure */
            'procedure' => [
                'deleteActivity' => "Session_delete_activity",
                'forget' => "Session_forget",
                'update' => "Session_update",
                'add' => "Session_add",
                'find' => "Session_find",
            ],
        ],
    ],
];