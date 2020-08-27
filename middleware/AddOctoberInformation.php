<?php

namespace RainLab\Ignition\Middleware;

use System\Models\Parameter;
use Facade\FlareClient\Report;
use System\Models\PluginVersion;
use System\Classes\UpdateManager;

class AddOctoberInformation
{
    public function handle(Report $report, $next)
    {
        $pluginList = '';
        $report->group('OctoberCMS information', [
            'October version' => Parameter::get('system::core.build'),
            'Plugins' => PluginVersion::all()->map(function ($plugin) use ($pluginList) {
                return $pluginList . ' ' . $plugin->code . ' (' . $plugin->version . ")";
            })
        ]);

        return $next($report);
    }
}
