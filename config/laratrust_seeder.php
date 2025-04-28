<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'admin' => [
            'roles' => 'c,r,u,d',
            'admins' => 'c,r,u,d',
            'users' => 'c,r,u,d',
            'settings' => 'c,r,u,d',
            'banks' => 'c,r,u,d',
            'levels' => 'c,r,u,d',
            'orders' => 'c,r,u,d',
            'games' => 'c,r,u,d',
            'transactions' => 'c,r,u,d',
            'currencies' => 'c,r,u,d',
            'countries' => 'c,r,u,d',
            'cities' => 'c,r,u,d',
            'agents' => 'c,r,u,d',
            'providers' => 'c,r,u,d',
        ],
        'user' => [

        ],
    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
