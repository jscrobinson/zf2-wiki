<?php
/**
 * This makes our life easier when dealing with paths. Everything is relative
 * to the application root now.
 */
chdir(dirname(__DIR__));
//define('ZF_CLASS_CACHE', 'data/cache/classes.php.cache'); if (file_exists(ZF_CLASS_CACHE)) require_once ZF_CLASS_CACHE;

// Setup autoloading
include 'init_autoloader.php';

// Run the application!
$reader = new Zend\Config\Reader\Yaml('Symfony\Component\Yaml\Yaml::parse');

$config = $reader->fromFile('config/application.config.yml', true);

Zend\Mvc\Application::init($config)->run();
