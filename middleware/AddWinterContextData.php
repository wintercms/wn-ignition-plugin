<?php namespace Winter\Ignition\Middleware;

use System\Models\Parameter;
use Facade\FlareClient\Report;
use System\Models\PluginVersion;
use System\Classes\PluginManager;

class AddWinterContextData
{
    public function handle(Report $report, $next)
    {
        // Initialize the Winter exception context data
        $context = [
            'Winter Build' => Parameter::get('system::core.build'),
        ];

        // Get the plugins on the system
        $systemPlugins = [];
        $pluginVersions = PluginVersion::all()->keyBy('code')->all();
        $availablePlugins = PluginManager::instance()->getAllPlugins();
        foreach ($availablePlugins as $code => $plugin) {
            $systemPlugins[$code] = [
                'disabled' => $plugin->disabled,
                'elevated' => $plugin->elevated,
                'version' => @$pluginVersions[$code]->version,
            ];
        }

        // Sort the plugins by code
        ksort($systemPlugins);

        // Attach the plugins to the Winter context data
        foreach ($systemPlugins as $code => $data) {
            $description = $data['version'] ?? 'Not initialized';

            if ($data['disabled']) {
                $description .= ' (disabled)';
            }

            if ($data['elevated']) {
                $description .= ' (elevated)';
            }

            $context['Plugin: ' . $code] = $description;
        }

        // Add the Winter context data to the overal exception context data
        $report->group('env', $context);

        return $next($report);
    }
}
