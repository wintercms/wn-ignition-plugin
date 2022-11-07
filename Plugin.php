<?php namespace Winter\Ignition;

use Config;
use Event;
use Spatie\LaravelIgnition\Facades\Flare;
use Spatie\LaravelIgnition\IgnitionServiceProvider;
use Spatie\LaravelIgnition\Renderers\ErrorPageRenderer;
use Spatie\LaravelIgnition\Renderers\IgnitionExceptionRenderer;
use System\Classes\PluginBase;

/**
 * Ignition Plugin Information File
 */
class Plugin extends PluginBase
{
    public $elevated = true;

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
        if (Config::get('app.debug', false)) {
            $this->app->register(IgnitionServiceProvider::class);
            Flare::registerMiddleware(\Winter\Ignition\Middleware\AddWinterContextData::class);
        }
    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {
        if (Config::get('app.debug', false)) {
            Event::listen('exception.beforeRender', function ($exception, $httpCode, $request) {
                $handler = new IgnitionExceptionRenderer(new ErrorPageRenderer());
                return $handler->render($exception);
            }, PHP_INT_MAX);
        }
    }
}
