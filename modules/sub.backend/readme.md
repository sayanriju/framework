Creating Sub.Modules
=========================

Managing applications very easy in Obullo. You don't need to divide applications.
Follow below the steps to creating sub modules.

## Creating Sub Module
- Create your sub module, for example `sub.modulename` in the `modules` directory.
- Copy `config` directory from `sub.backend` module and paste it to `sub.modulename` root.
- Create a `modules` directory your modules will be in here.
- if want to keep log and cache files in submodules directory, duplicate the `core` folder from
`default` module and paste it into `sub.modulename` directory.
- Give chmod -R (recursive) file write permission (777) to `modules/sub.yourmodule/core/` folder.

## Run
- Submodules works like modules
    `http://projectname/index.php/submodulename` (you don't need to `sub.` prefix in action)
- Submodule names must be different from module names.
- Running a module in sub.module.
    `http://projectname/index.php/submodule/module/controller/method`


## Segments
- Submodules will not be affect uri segments.                                    
    `http://projectname/index.php/submodule/module/controller/method/argument`
                                     sub     0        1        2       3  
- You can fetch a submodule using $this->uri->segment('sub'); function. If sub module not exist function 
returns to FALSE.

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