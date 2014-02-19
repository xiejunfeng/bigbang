<?php
namespace BullSoft\Sample;
use Phalcon\Config\Adapter\Ini as Config;

class Module
{
    public function registerAutoloaders()
    {
        $loader = new \Phalcon\Loader();
        $loader->registerNamespaces(array(
            'BullSoft\Sample\Controllers' => __DIR__.'/controllers/',
            'BullSoft\Sample\Models'      => __DIR__.'/models/',
            'BullSoft\Sample\Logics'      => __DIR__.'/logics/',
        ))->register();
    }

   /**
    *
    * Register the services here to make them module-specific
    *
    */
    public function registerServices($di)
    {
        $mConfig = new Config(__DIR__.'/confs/'.PHALCON_ENV.'.ini');
        $gConfig = $di->get('config');
        $gConfig->merge($mConfig);
        $di->set('config', $gConfig);

        // Registering a dispatcher
        $di->set('dispatcher', function () use ($di) {
            $dispatcher = new \Phalcon\Mvc\Dispatcher();
            $dispatcher->setDefaultNamespace("BullSoft\Sample\Controllers\\");
            return $dispatcher;
        });

        $di->set('view', function()  {
            $view = new \Phalcon\Mvc\View();
            $view->setViewsDir(__DIR__.'/views/');
            $view->registerEngines(array(
                ".volt" => function($view, $di) {
                    $volt = new \Phalcon\Mvc\View\Engine\Volt($view, $di);
                    $volt->setOptions(array(
                        "compiledPath"      => $di->get('config')->view->compiledPath,
                        "compiledExtension" => $di->get('config')->view->compiledExtension,
                        "compileAlways"     => (bool) $di->get('config')->application->debug
                    ));
                    $compiler = $volt->getCompiler();
                    $compiler->addExtension(new \BullSoft\Volt\Extension\PhpFunction());
                    return $volt;                    
                }
            ));
            return $view;
        });
    }
}
