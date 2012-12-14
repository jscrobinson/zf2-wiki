<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonWiki for the canonical source repository
 * @copyright Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Wiki;

use Zend\Mvc\ModuleRouteListener, Zend\Config, Zend\Config\Reader\Yaml;

class Module extends \Psycle\Ext\Module\AbstractModule
{
    public function onBootstrap($e)
    {
        $e->getApplication()->getServiceManager()->get('translator');
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
    }
		
    public function getConfig()
    {        
        return $this->_getConfig(__DIR__, array('SKIN_NAME' => $this->getWikiConfig()->skin));
    }

    /**
     *
     * @return Zend\Config\Config 
     */
    public function getWikiConfig()
    {
        $dir = __DIR__;
        $replacements = array('CURRENT_MODULE_PATH' => $dir);
        $reader = new Yaml('Symfony\Component\Yaml\Yaml::parse');        

        $config = new Config\Config($reader->fromFile($dir . '/config/wiki.config.yml', true), true);
        $constantProcessor = new Config\Processor\Constant();			
        $config = $constantProcessor->process($config);
        $tokenProcessor = new Config\Processor\Token($replacements);			
        $config = $tokenProcessor->process($config);

        return $config;
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
