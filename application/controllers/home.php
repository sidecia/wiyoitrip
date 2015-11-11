<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	 function __construct()
	 {
	   parent::__construct();
	   $this->load->library('session');
	   $this->load->library('Generic');	  	   	   
       $this->load->helper('language');
  	   $this->load->helper('url');	
	   $this->lang->load('home');   
	 }
	 function index()
	 {        
	 	   $this->lang->switch_uri('en');
	 	   $data['languaje']= $this->lang->lang();				      	   
		   $data['title'] = lang("titulo");	
		   $data["css"]=array("assets/js/hero-slider/css/style.css","assets/js/ihover/ihover.css","assets/js/swipe/swiper.min.css");
		   $data["js"]=array("assets/js/hero-slider/js/main.js","assets/js/swipe/swiper.min.js","assets/js/wiyoitrip.js");
		   $this->load->view('head',$data); 
		   $this->load->view('navbar',$data); 
		   $this->load->view('home',$data);	  	   	   
		   $this->load->view('foot');
	 }
}
?>