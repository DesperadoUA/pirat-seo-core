<?php
define("ID_FRONT", (int) get_option('page_on_front'));
define("ID_PRIVACY_POLICY_PAGE", 3);
define("TEMPLATES_DI_STYLE", [
    'PAGES' => [
        'FRONT_PAGE' => 'front',
        'PRIVACY_POLICY_PAGE' => 'private-policy-page',
        'DEFAULT' => 'default'
    ],
    'POSTS' => [
        'BLOG' => 'blog',
        'GAME' => 'game',
        'DEFAULT' => 'default'
    ],
    'CATEGORY' => [
        'DEFAULT' => 'default'
    ],
    'TAX' => [
        'DEFAULT' => 'default'
    ]
]);