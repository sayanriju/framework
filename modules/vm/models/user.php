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
        $key = $this->item('primary_key');
        
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
        
        return parent::delete();
    }
    
    /**
    * Save data to all tables
    * 
    * @param mixed $val
    * @return FALSE
    */
    function insert_all()
    {
        $last_id = $this->save();               // save to first table
        
        //------------- User Address ---------------//
        
        loader::model('table_user_address', false);   // save data to sub tables
        
        $adr = new Table_User_Address();
        $adr->user_id      = $last_id;
        $adr->address_line = $this->address_line;
        
        $last_id = $adr->save();
        
        $this->errors = array_merge($adr->errors, $this->errors);
        $this->values = array_merge($adr->values, $this->values);
        
        return $last_id;  
    }
    
    
    function update_all($id)
    {

    }
    
}