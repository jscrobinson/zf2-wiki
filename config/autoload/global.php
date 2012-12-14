<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overridding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),
    'db' => array(
        'driver'         => 'pdo',
        'dsn'            => 'mysql:dbname=zendwiki;host=127.0.0.1;',
        'username'       => 'root',
        'password'       => 'root',
        'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'UTF8'"),
    ),
	'session' => array(
			'use_cookies' => true,
			'use_only_cookies' => true,
			'cookie_httponly' => true,
			'name' => 'IPAMS_SESSION',
	),
	'errors' => array(        // Change error vars to false to stop information leakage
		'show_exceptions' => array(
				'message' => false,
				'trace' => false,
		)
	),
);