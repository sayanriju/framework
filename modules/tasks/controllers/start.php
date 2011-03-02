<?php
defined('CMD') or exit('Access Denied!');

Class Start extends Controller {
    
    function __construct()
    {   
        parent::__construct();
    }         
    
    public function index()
    {    
        echo '
        _____      ________     __     __  __        __          _______
      / ___  /    / ____   \   / /    / / / /       / /         / ___   /
    /  /   /  /  / /____/  /  / /    / / / /       / /        /  /   /  /
   /  /   /  /  / _____  /   / /    / / / /       / /        /  /   /  /
  /  /___/  /  / /____/  \  / /____/ / / /____   / /_____   /  /__ /  /
  /_______/   /__________/ /________/ /_______/ /_______ /  /_______/ 
  
                Welcome to Obullo Task Manager (c) 2011.
     Please run this command [$php task.php start help] for help !'."\n\n";
     /*
     loader::base_helper('request');
     $request = request('get', 'api/v3/a/?query=SELECT * FROM&a=b<b>ersin</b>', array('query' => 'SELECT * FROM'));
     echo $request->exec()->response();
     */
    }
    
    public function help()
    {
    echo "\nOBULLO GENERAL HELP FOR TASK OPERATIONS\n";
        
        echo "
    MANAGING TASKS IN /MODULES/TASKS FOLDER
    1 . Obullo has a '/tasks' folder in /modules directory.
    2 . In tasks folder you can create /model, /helpers, /views folders like other modules.
    3 . Also you can call hmvc requests from other modules.
    4 . Finally manually you can run a task controller like this : \n\t > \$php task.php controller method argument1 argument2 ...\n
    
    MANAGING TASKS IN CURRENT MODULE
    1 . You can also create '/tasks' folder in a module like this /modules/welcome/tasks/.
    2 . If you prefer this way you should just put your task controllers to in it, then Obullo tasks\noperations will work from this folder.
    3 . You don't need to create /model, /helpers, /views folders again, you already had it in current\nmodule.
    4 . Finally manually you can run a task controller like this : \n\t > \$php task.php module controller method argument1 argument2 ...\n
    look at / User Guide / General Topics / Tasks / for more details.\n\n";
    }
    
}

/* End of file start.php */
/* Location: .modules/tasks/start.php */