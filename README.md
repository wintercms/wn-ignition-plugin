# ignition-plugin
[WIP] Integrates support for the Ignition error logger in October CMS.

DON'T USE IN PRODUCTION


TODO:
- [ ] Verify configuration can be overrided in the October way, looks like package is loading configuration directly from a file path
- [ ] Fix support for theme-rendered pages, remove the Laravel debug=false error pages
- [x] Add October-specific context variables (October version, installed plugins & versions)
- [ ] Fix auth context variables to support October auth
- [ ] Filter out sensitive values (sessions, cookies, passwords, api keys, secrets, etc); especially when uploading to Flare
- [ ] See if there's some way to configure the "open in editor" links to be defined by an environment variable (both the editor and the base path to the file since the file could be run inside of Homestead which means the path wouldn't be valid on the host system)
- [ ] Change the styling to be more "October-fied" (oranges instead of blues/purples)
- [ ] Document how to extend the context variables
- [ ] Add ability to replay exceptions using the Ignition view (or at least the data from them) in the Backend Event Logs section
