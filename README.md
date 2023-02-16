# Ignition for Winter CMS

*Adds support for the [Ignition](https://flareapp.io/docs/ignition-for-laravel/installation) error page to Winter CMS*

## Installation

This plugin is available for installation via [Composer](http://getcomposer.org/).

```bash
composer require winter/wn-ignition-plugin
```

## Usage Notes:

### Configuration

See https://flareapp.io/docs/ignition-for-laravel/configuration for configuration options.

## License

This package is licensed under the [MIT license](https://github.com/wintercms/wn-ignition-plugin/blob/master/LICENSE.txt).

## Support

If you would like to contribute to this plugin's development, please feel free to submit issues or pull requests to the plugin's repository here: https://github.com/wintercms/wn-ignition-plugin

If you would like to support Winter CMS, please visit [WinterCMS.com](https://wintercms.com/support)


## TODO:
- DON'T USE IN PRODUCTION YET
- [ ] Verify configuration can be overrided in the Winter way, looks like package is loading configuration directly from a file path
- [x] Fix support for theme-rendered pages, remove the Laravel debug=false error pages
- [x] Add Winter-specific context variables (Winter version, installed plugins & versions)
- [ ] Fix auth context variables to support Winter auth
- [ ] Filter out sensitive values (sessions, cookies, passwords, api keys, secrets, etc); especially when uploading to Flare
- [x] See if there's some way to configure the "open in editor" links to be defined by an environment variable (both the editor and the base path to the file since the file could be run inside of Homestead which means the path wouldn't be valid on the host system)
- [ ] Change the styling to be more "Winter-fied" (blues instead of Laravel Red)
- [ ] Document how to extend the context variables
- [ ] Add ability to replay exceptions using the Ignition view (or at least the data from them) in the Backend Event Logs section
