<?php

Class Captcha extends Controller {

    function __construct()
    {
        parent::__construct();
        
        loader::database();
    }
    
    public function create()
    {
        loader::helper('ob/captcha');

        $query = $this->db->query("SELECT * FROM ob_captcha WHERE ip_address ='".i_ip_address()."'");

        if($query->num_rows() > 10)  // Delete captchas after ten records ..
        {
            $this->db->where('ip_address', i_ip_address());
            $this->db->delete('ob_captcha');
        }

        $vals = array(
            'max_char'   => 5,
            'img_path'   => 'modules/captcha/public/images/',
            'img_url'    => base_url().'modules/captcha/public/images/',
            'font_path'  => 'modules/captcha/public/fonts/FixedDisplay.ttf',
            'font_size'  => 20,
            'img_width'  => 100,
            'img_height' => 30,
            'expiration' => 40,
            'background' => '#FFFFFF',
            'border'     => '#CCCCCC',
            'text'       => '#000000',
            'grid'       => '#000000',
            'shadow'     => '#CCCCCC',
            'pool'       => '0123456789',
        );

        $data['cap'] = captcha_create($vals);

        $cap_data = array(   // Insert captcha value to database
            'captcha_time'  => $data['cap']['time'], 
            'ip_address'    => i_ip_address(),
            'word'          => $data['cap']['word'],
        );

        $this->db->insert('ob_captcha', $cap_data);

        if($this->uri->extension() == 'json')  // Ajax support
        {
            echo json_encode(array('image' => $data['cap']['image']));
            return;
        }

        echo serialize($data['cap']);  // we need return to string for HMVC
    }

    /**
    * Validate function
    *
    * return string
    */
    public function check()
    {
        $validator = lib('Validator');

        // We use Global POST variable instead of Local HMVC.
        $word =  i_get_post('captcha_answer', TRUE, $use_global_var = TRUE);

        log_me('debug', 'Wrong security word attempt: ' . $word);

        if(empty($word) OR $word == '')
        {
           $validator->set_message('captcha_check','The security code you entered not valid, please try again.');

           echo '0';
           return;
        }

        // First, delete old captchas
        $expiration = time()-7200;
        $this->db->query("DELETE FROM ob_captcha WHERE captcha_time < ".$expiration);

        // Check captcha
        $this->db->where('word', $word);
        $this->db->where('ip_address', i_ip_address());
        $this->db->where('captcha_time >', $expiration);

        $query = $this->db->get('ob_captcha');

        if ($query->num_rows() == 0)
        {
            $validator->set_message('captcha_check', 'The security code you entered not valid, please try again.');

            echo '0';  // wrong answer

        } else
        {
            echo '1';  // right answer
        }
    }

}

/* End of file captcha.php */
/* Location: .modules/captcha/controllers/captcha.php */