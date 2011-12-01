<?php
  
Class User extends VM
{
    function __construct()
    {
        parent::__construct();
        
        $this->settings['fields']['captcha_answer'] = array(
          'label' => 'Security Image',
          'type'  => 'string',
          'rules' => 'trim|required|integer|min_lenght[1]|max_length[5]|callback_captcha_check'
        );
    }
    
    public $settings = array(
    'database' => 'db',
    'table'    => 'users',
    'primary_key' => 'usr_id',
    'fields' => array
     (
        'usr_id' => array(
          'label' => 'ID',
          'type'  => 'int',
          'rules' => 'trim|integer'
        ),
        'usr_username' => array(
         'label'  => 'Username',  // you can use lang:username
         'type'   => 'string',
         'rules'  => 'required|trim|unique|min_lenght[3]|max_length[100]|xss_clean'
        ),
        'usr_password' => array(
          'label' => 'Password',
          'type'  => 'string',
          'rules' => 'required|trim|min_lenght[6]|encrypt',
          'func'  => 'md5'
        ),
        'usr_confirm_password' => array(
          'label' => 'Confirm Password',
          'type'  => 'string',
          'rules' => 'required|encrypt|matches[usr_password]'
        ),
        'usr_email' => array(
          'label' => 'Email Address',
          'type'  => 'string',
          'rules' => 'required|trim|valid_emails'
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
    * @param string $mixed $val $this->db->where($key, $val); (set value)
    */
    function delete($key = '', $val = '')
    {
        $this->before_delete();
        
        $key = ($key == '') ? $this->item('primary_key') : $key;
        
        if(is_array($val))
        {
            foreach($val as $k => $v)
            {
                $this->{$k} = $v;  // set data for validation
            }
            
            $this->db->where_in($key, $val);
        }
        elseif($val != '')
        {
            $this->{$key} = $val;  // set data for validation
            
            $this->db->where($key, $val);  
        }
        
        $result = parent::delete();
        
        $this->after_delete();
        
        return $result;
    }
    
    
    /**
    * Validate captcha answer.
    *
    * @return  boolean
    */
    public function captcha_check()
    {
        loader::helper('ob/request');

        $response = request('/captcha/check')->exec();
        
        if($response == '0')
        {
            return FALSE;
        }
        elseif($response == '1')
        {
            return TRUE;
        }
    }
    
}


/* End of file start.php */
/* Location: .modules/test/controllers/vm/start.php */