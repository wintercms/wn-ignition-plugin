<?php namespace Winter\Ignition;

use Backend;
use Spatie\LaravelIgnition\IgnitionServiceProvider;
use Spatie\LaravelIgnition\Renderers\ErrorPageRenderer;
use Spatie\LaravelIgnition\Renderers\IgnitionExceptionRenderer;
use System\Classes\PluginBase;

/**
 * ignition Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'winter.ignition::lang.plugin.name',
            'description' => 'winter.ignition::lang.plugin.description',
            'author'      => 'winter',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {
        \App::register(IgnitionServiceProvider::class);
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        \Event::listen('exception.beforeRender', function ($exception, $httpCode, $request) {
            /*            error_reporting(E_ALL);
                        ini_set('display_errors', 1);*/

            $handler = new IgnitionExceptionRenderer(new ErrorPageRenderer());
            return $handler->render($exception);
        }, PHP_INT_MAX);
    }
}
