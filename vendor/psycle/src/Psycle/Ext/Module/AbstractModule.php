<?php
namespace Psycle\Ext\Module;

use Zend\Config\Reader\Yaml, Zend\Config;

abstract class AbstractModule {
	abstract public function getConfig();
	
	protected function _getConfig($dir = null, $replacements = array())
	{
		$replacements = array_merge(array('CURRENT_MODULE_PATH' => $dir), $replacements);
		$reader = new Yaml('Symfony\Component\Yaml\Yaml::parse');
		if(!defined('APPLICATION_PATH'))
                    define('APPLICATION_PATH', realpath($_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR));

		$config = new Config\Config($reader->fromFile($dir . '/config/module.config.yml', true), true);
		$constantProcessor = new Config\Processor\Constant();			
		$config = $constantProcessor->process($config);
		$tokenProcessor = new Config\Processor\Token($replacements);			
		$config = $tokenProcessor->process($config);

		return $config;
	}
}