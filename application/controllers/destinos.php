<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Destinos extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->library('session');
	   $this->load->library('Generic');		   	  
	   $this->load->model('destino','',TRUE);	 
       $this->load->helper('language');
  	   $this->load->helper('url');	
	   $this->lang->load('destinos'); 	 
	 }
	 function index()
	 {        	 	
	 	$data['languaje']= $this->lang->lang();	
		$data['title'] = lang("tituloDestinos");
		$data['js']=array("http://maps.google.com/maps/api/js?sensor=false","assets/js/mapas.js");	 
		$this->load->view('head',$data); 
		$this->load->view('navbar',$data);  			
		if ($this->uri->segment(4) === FALSE) $destino_id = 0;
		else $destino_id = $this->uri->segment(4);		
		if($destino_id>0){
				//Vemos el detalle del destino
				$this->load->view('destino-detalle',$data);	 
		}
		else{
			    //Vemos los destinos en General
			
		}
		$this->load->view('foot');
	 }	 
}
?>