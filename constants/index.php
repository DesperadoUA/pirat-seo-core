<?php
define("THEME_ROOT", dirname(__DIR__));
define("URL", $_SERVER["REQUEST_URI"]);
define("HTML_ATTRS", ["RU" => "ru", "UA" => "uk"]);
define("LANG", "RU");
define("TEMPLATE_DIR_URI", get_template_directory_uri());
define("SITE_URL", get_site_url());