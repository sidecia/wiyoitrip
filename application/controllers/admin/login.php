<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 	 public function __construct()
     {
          parent::__construct();
          $this->load->library('session');
          $this->load->helper('form');
          $this->load->helper('url');
          $this->load->helper('html');
          $this->load->database();
          $this->load->library('form_validation');
          //load the user model
          $this->load->model('admin/user','',TRUE);		 
     }

     public function index()
     {
		$data['title'] = "Login";
		$this->load->view('admin/encabezado',$data);
		if(!$this->session->userdata('logged_in'))
   		{
          //get the posted values
          $username = $this->input->post("txt_username");
          $password = $this->input->post("txt_password");

          //set validations
          $this->form_validation->set_rules("txt_username", "Username", "trim|required");
          $this->form_validation->set_rules("txt_password", "Password", "trim|required|callback_check_database");

          if ($this->form_validation->run() == FALSE)
          {
               //validation fails
               $this->load->view('admin/login_view');
          }
          else
          {		//Go to private area
				redirect(base_url('admin/admin'), 'refresh');            
          }
		}else{
			redirect(base_url('admin/admin'), 'refresh');
		}		
		$this->load->view('admin/pie');
     }
	 
	 function check_database($password)
	 {	   
	   $username = $this->input->post('txt_username');
	
	   //query the database
	   $result = $this->user->login($username, $password);
	
	   if($result)
	   {
		 $sess_array = array();
		 foreach($result as $row)
		 {
		   $sess_array = array(
			 'id' => $row->idusuario,
			 'username' => $row->nombre." ".$row->apellidopaterno." ".$row->apellidomaterno,
			 'nivel' => $row->nivelusuario
		   );
		   $this->session->set_userdata('logged_in', $sess_array);
		 }
		  return TRUE;
	   }
	   else
	   {
		 $this->form_validation->set_message('check_database', 'Usuario y/o password no validos.');
		 return false;
	   }
	 }
}
 
?>