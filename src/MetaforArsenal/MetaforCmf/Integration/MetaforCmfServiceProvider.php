<?php

namespace MetaforArsenal\MetaforCmf\Integration;

use Illuminate\Support\ServiceProvider;
use MetaforArsenal\MetaforCmf\MetaforCmf;

class MetaforCmfServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap events.
     *
     * @return void
     */
    public function boot()
    {
        // Register the config file for being published
        $this->publishes([
            __DIR__ . '/../../../../config/config.php' => config_path('metafor_cmf.php')
        ], 'config');
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('metaforcmf', function($app)
        {
            // Possible dependencies: $app['config'], $app['Illuminate\Contracts\Cache\Repository']
            return new MetaforCmf();
        });
        $this->registerViews();
        $this->registerRoutes();
    }
    
    /**
     * Register the views directory
     *
     * @return void
     */
    protected function registerViews()
    {
        /** @var \Illuminate\View\Factory $view */
        $view = $this->app->get('view');
        //$view->addNamespace('metaforCmf', realpath(__DIR__.'/../resources/views'));
    }
    
    /**
     * Register the routes
     *
     * @return void
     */
    protected function registerRoutes()
    {
        /** @var \Illuminate\Routing\Router $router */
        $router = $this->app->get('router');
        $router->group(['middleware' => 'web'], function () use ($router) {
            $controllerName = TranslationFactoryController::class;
            // $router->get('example-url', $controllerName . '@index');            
        });
    }
}
