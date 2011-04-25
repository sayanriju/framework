<?php
  
Class User_Address extends VM
{
    function __construct()
    {
        parent::__construct($this->settings);
    }
    
    public $settings = array(
    'database' => 'db',
    'table'    => 'user_address',
    'primary_key' => 'id',
    'fields' => array
     (
        'id' => array(
          'label' => 'ID',
          'type'  => 'int',
          'rules' => 'trim|integer'
        ),
        'user_id' => array(
          'label' => 'User ID',
          'type'  => 'int',
          'rules' => 'trim|integer'
        ),
        'address_line' => array(
         'label'  => 'Address', 
         'type'   => 'string',
         'rules'  => 'required|trim|min_lenght[3]|max_length[60]|xss_clean'
        )
        
    ));
    
    function get($limit = '', $offset = '')
    {        
        $this->db->select('*');
        return $this->db->get('user_address', $limit, $offset);
    }

    /**
    * Update / Insert
    * 
    * @param mixed $val
    */
    function save($val = '')
    {   
        $id = $this->settings['primary_key'];
        
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
        $id = $this->settings['primary_key'];
        
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
    
}