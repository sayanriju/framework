<?php
  
Class User extends VM
{
    function __construct()
    {
        parent::__construct($this->settings);
    }
    
    public $settings = array(
    'database' => 'db',
    'table'  => 'users',
    'fields' => array
     (
        'id' => array(
          'label' => 'ID',
          'type'  => 'int|primary_key',
          'rules' => 'trim|int'
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
    
    function find($limit = '', $offset = '')
    {        
        $this->db->select('*');
        return $this->db->get('users', $limit, $offset);
    }

    /**
    * Update
    * 
    * @param mixed $val
    */
    function save($val = '')
    {   
        if(is_array($val))
        {
            $this->db->where_in('id', $val);
        }
        else 
        {
            $this->db->where('id', 3);  
        }
        
        return parent::save(FALSE);
    }
    
    /**
    * Delete
    * 
    * @param mixed $val
    */
    function delete($val = '')
    {
        if(is_array($val))
        {
            $this->db->where_in('id', $val);
        }
        else 
        {
            $this->db->where('id', 3);  
        }
        
        return parent::delete(FALSE);
    }
    
    function delete_all()
    {
        
    }
    
}