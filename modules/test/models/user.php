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
            parent::validator($data);  // manually validate ID field
        }
        
        return $this->db->get('users', $limit, $offset);
    }
    
    function before_save(){}
    function after_save(){}
    
    /**
    * Update / Insert
    * 
    * @param mixed $val
    */
    function save($key = '', $val = '')
    {   
        $this->before_save();
        
        $key = ($key == '') ? $this->item('primary_key') : $key; 
        
        if(is_array($val))
        {
            $this->db->where_in($key, $val);
        }
        elseif($val != '')
        {
            $this->db->where($key, $val);  
        }
        
        $result = parent::save();

        $this->after_save();

        return $result;
    }
    
    function before_delete(){}
    function after_delete() {}
    
    /**
    * Delete
    * 
    * @param string $key $this->db->where($key, ); (set table field)
   *  @param string $mixed $val $this->db->where($key, $val); (set value)
    */
    function delete($key = '', $val = '')
    {
        $this->before_delete();
        
        $key = ($key == '') ? $this->item('primary_key') : $key;
        
        if(is_array($val))
        {
            foreach($val as $k => $v)
            {
                $this->$k = $v;  // set data for validation
            }
            
            $this->db->where_in($key, $val);
        }
        elseif($val != '')
        {
            $this->$key = $val;   // set data for validation
            
            $this->db->where($key, $val);  
        }
        
        $result = parent::delete();
        
        $this->after_delete();
        
        return $result;
    }
    
    
}