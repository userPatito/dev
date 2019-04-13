<?php

define('BASE_URL', '//localhost/dev_fest');

// Database Config
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'gdg_eventos');
define('DB_CHAR', 'utf8');

// Slim Config
$slim_config =  [
                    'debug'                 => true,
                    'templates.path'        =>  'templates',
                    'cookie.encrypt'        =>  true,
                    'cookie.secrect_key'    =>  md5('encriptar_md5_gdg')
                ];