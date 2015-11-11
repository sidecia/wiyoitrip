<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {

 function __construct()
 {
   parent::__construct();
   $this->load->library('session');
   $this->load->library('Generic');
   $this->load->model('admin/modulos','',TRUE);		
 }
 function index()
 {  
   
   if($this->session->userdata('logged_in'))
   {
	   $session_data = $this->session->userdata('logged_in');	   
	   $modulos = $this->modulos->getModulos();
	   $data["modulos"]=$modulos;
	   $genric = new Generic($session_data['id']);  		  
	   $data['title'] = "Administrador";
	   $data['nivelusuario'] = $session_data['nivel'];  
	   $this->load->view('admin/encabezado',$data); 	  	   
	   $data['username'] = $session_data['username'];	      
	   $this->load->view('admin/menu_view',$data);	   
	   $this->load->view('admin/admin_view', $data);
   }
   else
   {
     redirect(base_url('admin/login'), 'refresh');
   }
   $this->load->view('admin/pie');
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect(base_url('admin/login'), 'refresh');
 }

}

?>