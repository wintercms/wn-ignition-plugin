<?php return [
    'packages' => [
        'facade/ignition' => [
            // Providers to be registered for this package
            'providers' => [
                \Facade\Ignition\IgnitionServiceProvider::class,
            ],

            // The configuration namespace for this package's configuration
            'config_namespace' => 'ignition',

            // The configuration for this package
            'config' => [
                /*
                |--------------------------------------------------------------------------
                | Editor
                |--------------------------------------------------------------------------
                |
                | Choose your preferred editor to use when clicking any edit button.
                |
                | Supported: "phpstorm", "vscode", "vscode-insiders",
                |            "sublime", "atom"
                |
                */

                'editor' => env('IGNITION_EDITOR', 'phpstorm'),

                /*
                |--------------------------------------------------------------------------
                | Theme
                |--------------------------------------------------------------------------
                |
                | Here you may specify which theme Ignition should use.
                |
                | Supported: "light", "dark", "auto"
                |
                */

                'theme' => env('IGNITION_THEME', 'light'),

                /*
                |--------------------------------------------------------------------------
                | Sharing
                |--------------------------------------------------------------------------
                |
                | You can share local errors with colleagues or others around the world.
                | Sharing is completely free and doesn't require an account on Flare.
                |
                | If necessary, you can completely disable sharing below.
                |
                */

                'enable_share_button' => env('IGNITION_SHARING_ENABLED', true),

                /*
                |--------------------------------------------------------------------------
                | Register Ignition commands
                |--------------------------------------------------------------------------
                |
                | Ignition comes with an additional make command that lets you create
                | new solution classes more easily. To keep your default Laravel
                | installation clean, this command is not registered by default.
                |
                | You can enable the command registration below.
                |
                */
                'register_commands' => env('REGISTER_IGNITION_COMMANDS', false),

                /*
                |--------------------------------------------------------------------------
                | Ignored Solution Providers
                |--------------------------------------------------------------------------
                |
                | You may specify a list of solution providers (as fully qualified class
                | names) that shouldn't be loaded. Ignition will ignore these classes
                | and possible solutions provided by them will never be displayed.
                |
                */

                'ignored_solution_providers' => [
                    // \Facade\Ignition\SolutionProviders\MissingPackageSolutionProvider::class,
                ],

                /*
                |--------------------------------------------------------------------------
                | Runnable Solutions
                |--------------------------------------------------------------------------
                |
                | Some solutions that Ignition displays are runnable and can perform
                | various tasks. Runnable solutions are enabled when your app has
                | debug mode enabled. You may also fully disable this feature.
                |
                */

                'enable_runnable_solutions' => env('IGNITION_ENABLE_RUNNABLE_SOLUTIONS', null),

                /*
                |--------------------------------------------------------------------------
                | Remote Path Mapping
                |--------------------------------------------------------------------------
                |
                | If you are using a remote dev server, like Laravel Homestead, Docker, or
                | even a remote VPS, it will be necessary to specify your path mapping.
                |
                | Leaving one, or both of these, empty or null will not trigger the remote
                | URL changes and Ignition will treat your editor links as local files.
                |
                | "remote_sites_path" is an absolute base path for your sites or projects
                | in Homestead, Vagrant, Docker, or another remote development server.
                |
                | Example value: "/home/vagrant/Code"
                |
                | "local_sites_path" is an absolute base path for your sites or projects
                | on your local computer where your IDE or code editor is running on.
                |
                | Example values: "/Users/<name>/Code", "C:\Users\<name>\Documents\Code"
                |
                */

                'remote_sites_path' => env('IGNITION_REMOTE_SITES_PATH', ''),
                'local_sites_path' => env('IGNITION_LOCAL_SITES_PATH', ''),

                /*
                |--------------------------------------------------------------------------
                | Housekeeping Endpoint Prefix
                |--------------------------------------------------------------------------
                |
                | Ignition registers a couple of routes when it is enabled. Below you may
                | specify a route prefix that will be used to host all internal links.
                |
                */
                'housekeeping_endpoint_prefix' => '_ignition',
            ],
        ],

        'facade/flare-client-php' => [
            // The aliases to be registered for this package
            'aliases' => [
                // 'Flare' => \Facade\Ignition\Facades\Flare::class,
            ],

            // The configuration namespace for this package's configuration
            'config_namespace' => 'flare',

            // The configuration for this package
            'config' => [
                /*
                |--------------------------------------------------------------------------
                | Flare API key
                |--------------------------------------------------------------------------
                |
                | Specify Flare's API key below to enable error reporting to the service.
                |
                | More info: https://flareapp.io/docs/general/projects
                |
                */

                'key' => env('FLARE_KEY'),

                /*
                |--------------------------------------------------------------------------
                | Reporting Options
                |--------------------------------------------------------------------------
                |
                | These options determine which information will be transmitted to Flare.
                |
                */

                'reporting' => [
                    'anonymize_ips' => true,
                    'collect_git_information' => false,
                    'report_queries' => true,
                    'maximum_number_of_collected_queries' => 200,
                    'report_query_bindings' => true,
                    'report_view_data' => true,
                    'grouping_type' => null,
                ],

                /*
                |--------------------------------------------------------------------------
                | Reporting Log statements
                |--------------------------------------------------------------------------
                |
                | If this setting is `false` log statements won't be send as events to Flare,
                | no matter which error level you specified in the Flare log channel.
                |
                */

                'send_logs_as_events' => true,
            ],
        ],
    ],
];