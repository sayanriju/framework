<?php
  
Class User extends VM
{
    function __construct()
    {
        parent::__construct($this->settings);
    }
    
    public $settings = array(
    'database' => 'db',
    'table'    => 'users',
    'primary_key' => 'id',
    'fields' => array
     (
        'id' => array(
          'label' => 'ID',
          'type'  => 'int',
          'rules' => 'trim|integer'
        ),
        'name' => array(
         'label'  => 'name', 
         'type'   => 'string',
         'rules'  => 'trim|min_lenght[3]|max_length[40]|xss_clean'
        ),
        'username' => array(
         'label'  => 'Username',  // you can use lang:username
         'type'   => 'string',
         'rules'  => 'required|trim|unique|min_lenght[3]|max_length[40]|xss_clean'
        )
        ,'password' => array(
          'label' => 'Password',
          'type'  => 'string',
          'rules' => 'required|trim|min_lenght[6]|encrypt'
        ),
        'confirm_password' => array(
          'label' => 'Confirm Password',
          'type'  => 'string',
          'rules' => 'required|encrypt|matches[password]'
        ),
        'email' => array(
          'label' => 'Email Address',
          'type'  => 'string',
          'rules' => 'required|trim|valid_email'
        )
        
    ));
    
    function get($limit = '', $offset = '', $id = '')
    {        
        $this->db->select('*');
        
        if($id != '')
        {
            $data = array('id' => $id);
            parent::validator($data);
        }
        
        return $this->db->get('users', $limit, $offset);
    }

    /**
    * Update / Insert
    * 
    * @param mixed $val
    */
    function save($val = '')
    {   
        $id = $this->item('primary_key');
        
        if(is_array($val))
        {
            $this->db->where_in($id, $val);
        }
        elseif($val != '')
        {
            $this->db->where($id, $val);  
        }
        
        return parent::save();
    }
    
    /**
    * Delete
    * 
    * @param mixed $val
    */
    function delete($val = '')
    {
        $id = $this->item('primary_key');
        
        if(is_array($val))
        {
            foreach($val as $k => $v)
            {
                $this->$k = $v;  // set data for validation
            }
            
            $this->db->where_in($id, $val);
        }
        elseif($val != '')
        {
            $this->$id = $val;   // set data for validation
            
            $this->db->where($id, $val);  
        }
        
        return parent::delete();
    }
    
    
    function save_all($val = '')
    {
        $this->save($val);      // save to first table
        
        $id = $this->item('primary_key');
        
        $last_id = $this->values[$id];
        
        loader::model('user_address', false);   // save data to second table
        
        $address = new User_Address();
    }
    
}