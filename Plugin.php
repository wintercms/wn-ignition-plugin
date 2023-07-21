<?php

namespace Winter\Ignition;

use Config;
use Event;
use Illuminate\Support\Facades\Request;
use Spatie\LaravelIgnition\Facades\Flare;
use Spatie\LaravelIgnition\IgnitionServiceProvider;
use Spatie\LaravelIgnition\Renderers\ErrorPageRenderer;
use Spatie\LaravelIgnition\Renderers\IgnitionExceptionRenderer;
use System\Classes\PluginBase;
use Winter\Storm\Exception\AjaxException;
use Winter\Storm\Exception\ApplicationException;

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
            $this->registerIgnition();
        }
    }

    /**
     * Register Ignition
     */
    protected function registerIgnition(): void
    {
        // Mirror the configuration over to the appropriate keys
        Config::set('ignition', Config::get('winter.ignition::ignition'));
        Config::set('flare', Config::get('winter.ignition::flare'));

        // Register the package service provider & alias
        $this->app->register(IgnitionServiceProvider::class);
        $this->app->alias('Flare', Flare::class);

        // Register the custom Winter context data middleware
        Flare::registerMiddleware(\Winter\Ignition\Middleware\AddWinterContextData::class);

        // Register the exception handler
        Event::listen('exception.beforeRender', function ($exception, $httpCode, $request) {
            // Let winter handle rendering AjaxExceptions & ApplicationExceptions
            if (
                Request::ajax()
                && ($exception instanceof AjaxException)
                || ($exception instanceof ApplicationException)
            ) {
                return;
            }

            $handler = new IgnitionExceptionRenderer(new ErrorPageRenderer());
            return $handler->render($exception);
        }, PHP_INT_MAX - 20);
    }
}
