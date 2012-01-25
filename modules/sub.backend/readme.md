Creating Sub.Modules
=========================

Managing applications very easy in Obullo. You don't need to divide applications.
Follow below the steps.

## Creating Sub Module
- Create folder called `sub.yourmodule` in the `modules` directory.
- Copy `config` directory from `sub.backend` module and paste it to `sub.yourmodule` root.
- Create `modules` directory and build your modules in here.
- if want to keep log and cache files into submodules directory, duplicate the `core` folder from
`default` module and paste it into `sub.yourmodules` directory.
- Give chmod -R (recursive) file write permission (777) to `modules/sub.yourmodule/core/` folder.

## Run
- Call your sub module like this
    `http://projectname/index.php/yoursubmodulename` (you don't need to `sub.` prefix in action)
- Submodule name should be different from module names.

## Tips
- You can add sub.module route rules into `/sub.module/config/routes.php` file, database, autload, autorun,
constants, plugins, config files are the same.

## Hmvc Requests
- Example hmvc request to a sub module. 
    `echo request('backend/hello/test/1/2/3')->exec();`.
- Example hmvc request to a module inside from any sub module.
    `echo request('captcha/create')->exec();`.

## CLI and Task Requests
`php task.php backend start` this command will invoke the start controller which is located in
your `sub.backend/modules/tasks/` folder.