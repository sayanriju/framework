<?php

Class Welcome extends Welcome_Controller {
    
    function __construct()
    {   
        parent::__construct();
        
        loader::base_helper('request');
        
        // loader::req('../error_mail/test/MY_Model', false);
        // loader::base_helper('request');
        // loader::model('doly');
        
        if($ejf){ echo ' ersn';}
    }         
    
    public function index()
    {     
        /*
        $sql = lib('sql');
        $output = $sql->get('table');
        */
        // $this->db->query($output);
        
        view_var('title', 'Welcome to Obullo Framework !');
        
        // $A = NEW DFDF();
        
        $arc = new stdClass();
        $arc->es = 'asdasd';
        
        // echo $arc;
        
        // print_r(get_config('extensions')); exit;
        
        // $myarray = &loader::database();
    
        
        // is_extension('email_error');
        
        // $ext = get_config('extensions');
        
        // print_r($ext);
        
        // echo $myarray[$myarray];
        // echo $arc;
        
        // $field = '';
        
        // $this->db->query('SELECT * FROM artic');
        
        // loader::model('doly');   
                            /*
        $response = request('get', 'api/v3?query=SELECT * FROM&a=b<b>ersin</b>', 
        array('query' => 'SELECT * FROM mailer'), true);
        
        echo $response;
        */
        // $this->doly->test();
          /*
        $params = array(
            'mode'         => 'Sliding',  // Jumping
            'per_page'     => 8,
            'delta'        => 2,
            'http_method'  => 'GET',
            'query_string' => FALSE,
            'current_page' => $this->uri->segment(3),
            'base_url'     => '/framework/index.php/welcome/welcome/index/',
        );

        // just dummy data
        $params['item_data']  = range(1, 1000);

        $pager = lib('Pager')->init($params);

        $paged_data  = $pager->get_page_data();
        $links = $pager->get_links();

        // $links is an ordered + associative array with 'back'/'pages'/'next'/'first'/'last'/'all' links.
        // NB: $links['all'] is the same as $pager->links;

        echo $links['all'];

        echo '<hr />';

        // Show data for current page:
        echo 'PAGED DATA: '; print_r($paged_data);

        echo '<hr />';
                  */                    
       /* 
        $query ='dfdf';
        $request = request('get', 'api/v3/a/?query=SELECT * FROM&a=b<b>ersin</b>', array('query' => $query));
        echo $request->exec()->response();
       */ 

        /*
        $query ='dfdf';
        $request = request('get', 'api/v3/a/?query=SELECT * FROM&a=b<b>ersin</b>', array('query' => $query));
        echo $request->exec()->response();
        */ 
                       
        $data['var'] = 'and generated by ';  
        view_var('body', view('view_welcome', $data));
        view_layout('layout_welcome'); 
    }
    
    
    function test($arg1 = '', $arg2 = '')
    {
        echo 'hmvc-cmd-test: '.$arg1 .' -- '.$arg2;
    }
    
}

/* End of file start.php */
/* Location: .modules/welcome/controllers/welcome.php */