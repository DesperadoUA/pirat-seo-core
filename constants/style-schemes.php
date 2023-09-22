<?php
define("ID_FRONT", (int) get_option('page_on_front'));
define("ID_PRIVACY_POLICY_PAGE", 3);
define('COMMON_COMPONENTS', ['common', 'content']);
define("TEMPLATES_DI_STYLE", [
    'PAGES' => [
        'FRONT_PAGE' => array_merge(COMMON_COMPONENTS, ['faq']),
        'PRIVACY_POLICY_PAGE' => array_merge(COMMON_COMPONENTS, []),
        'DEFAULT' => array_merge(COMMON_COMPONENTS, [])
    ],
    'POSTS' => [
        'BLOG' => array_merge(COMMON_COMPONENTS, []),
        'GAME' => array_merge(COMMON_COMPONENTS, []),
        'DEFAULT' => array_merge(COMMON_COMPONENTS, [])
    ],
    'CATEGORY' => [
        'DEFAULT' => array_merge(COMMON_COMPONENTS, [])
    ],
    'TAX' => [
        'DEFAULT' => array_merge(COMMON_COMPONENTS, [])
    ]
]);