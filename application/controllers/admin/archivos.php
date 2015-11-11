<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#Clase para administrar Archivos 
class Archivos extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
  		$this->load->library('Generic');
		$this->load->library('grocery_CRUD');
	}

	public function _archivos_output($output = null)
	{	   
		#Verificamos que el usuario este firmado
	   if($this->session->userdata('logged_in'))
	   {
		   	
		   $session_data = $this->session->userdata('logged_in');	   
		   $genric = new Generic($session_data['id']); 		
		   #Le pasamos los archivos css,js que grocery crud necesita para su funcionamiento   
		   if(isset($output->js_files)) 	
		   		$data["js_files"]= $output->js_files;
		   if(isset($output->js_lib_files)) 
		   		$data["js_lib_files"]= $output->js_lib_files;
		   if(isset($output->js_config_files))		
		  		$data["js_config_files"]= $output->js_config_files;
		   if(isset($output->css_files))		
		   		$data["css_files"]= $output->css_files;
		   #definimos el titulo de la Pagina, el nivel de usuario y el nombre del usuario  
		   $data['title'] = "Administrador"; 
		   $data['nivelusuario'] = $session_data['nivel'];
		   $data['username'] = $session_data['username'];		  
		   #Cargamos la vista del encabezado donde se encuentran los js y css
		   $this->load->view('admin/encabezado',$data); 	  
		   #Cargamos el menu		  	      
		   $this->load->view('admin/menu_view',$data);
		   #Cargamos la vista de Usuarios
		   $this->load->view('admin/rud_view.php',$output);
	   }
	   else
	   {
		 redirect(base_url('admin/login'), 'refresh');
	   }
	   $this->load->view('admin/pie');
	}
	public function index()
	{				
		$crud = new grocery_CRUD();
		$crud->set_theme('flexigrid');
		#Indicamos que tabla se va a usar
		$crud->set_table('archivos');		
		#Modificamos el titulo que se muestra en los listados y fomularios	 
		$crud->set_subject('Archivos');		
		
		$crud->columns('titulo','tipoBanner','descripcion');	
		$crud->display_as('titulo','Titulo')
			 ->display_as('tipoBanner','Tipo')
			 ->display_as('descripcion','Descripciòn')
			 ->display_as('link','Link')
			 ->display_as('idArchivo','Archivo')	
			 ->display_as('orden','Orden')			  
		;
		$crud->set_rules('titulo','Titulo','required');
		$crud->set_rules('tipoBanner','Tipo','required');
				
		$crud->field_type('tipoBanner','dropdown',
            array('1' => 'Imagen', '2' => 'Video'));
		$config = array(
			'main_table' => 'banners',
			'main_table_primary' => 'idBanner',
			"url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', //path to method
			'ajax_loader' => base_url() . 'assets/img/ajax-loader.gif' // path to ajax-loader image. It's an optional parameter
		);
		$output = $crud->render();
		#Enviamos el resultado a la funcion usuarios_output para que sea pasado a una vista para mostrarlo
		$this->_archivos_output($output);
	}	
}