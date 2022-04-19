<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/*
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('branch_login');
	}

	public function post_login()
        {
 
        $this->form_validation->set_rules('name', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
 
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
        if ($this->form_validation->run() === FALSE)
        {  
            $this->load->view('branch_login');
        }
        else
        {   
            $data = array(
               'name' => $this->input->post('name'),
               'password' => hash('sha512', $this->input->post('password')),
 
             );
   
            $check = $this->Branch->login($data);
            
            if($check == true){
 
                 $user = array(
                 'branch_id' => $check->id,
                 'id' => $check->id,
                 'name' => $check->branch_name,
                );
       
            $this->session->set_userdata($user);
 
             redirect('branch/dashboard') ; 
            }
            else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     //redirect('Welcome');  
                } 
 
          $this->load->view('branch_login');
        }
         
    }
}