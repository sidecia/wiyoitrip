<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
#Clase para administrar Archivos 
class Banners extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->library('session');
  		$this->load->library('Generic');
		$this->load->library('grocery_CRUD');
	}

	public function _banners_output($output = null)
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
		   $this->load->view('admin/crud_view.php',$output);
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
		$crud->set_theme('flexigrid2');
		/*$crud->fields( 
			'tabs' 
			,'title','description','release_year','length','rating','special_features' 
			,'actors','category' 
			,'rental_duration','rental_rate','replacement_cost' 
		); 
		$tabs = array ( 
			array('Film','title','description','release_year','length','rating','special_features') 
			,array('Actors-Category','actors','category') 
			,array('Rental','rental_duration','rental_rate','replacement_cost') 
		); 
		$this->session->set_userdata('myproject_film_tabs', $tabs); // Send variables to the callback via session data 
		$crud->callback_field('tabs',array($this,'_form_tabs')); // Make the fake field */
		#Indicamos que tabla se va a usar
		$crud->set_table('banners');		
		#Modificamos el titulo que se muestra en los listados y fomularios	 
		$crud->set_subject('Bannners');				
		$crud->columns('nombre','activo');	
				
		$crud->set_rules('nombre','Nombre','required');		
				
		$crud->field_type('activo','dropdown',
            array('S' => 'Si', 'N' => 'No'));
		
		$config = array(
			'main_table' => 'banners',
			'main_table_primary' => 'idbanner',
			"url" => base_url() . __CLASS__ . '/' . __FUNCTION__ . '/', //path to method
			'ajax_loader' => base_url() . 'assets/img/ajax-loader.gif' // path to ajax-loader image. It's an optional parameter
		);
		
		$crud->set_field_upload('archivo','assets/uploads/files');
		$output = $crud->render();
		#Enviamos el resultado a la funcion usuarios_output para que sea pasado a una vista para mostrarlo
		$this->_banners_output($output);
	}	
	function _form_tabs()
    {
        $tabs = $this->session->userdata('myproject_film_tabs'); // retrieve arrays from session data
        // build the tabs
        $html = '
            <!-- tabs -->
            <ul class="nav nav-tabs" data-toggle="myproject.tabs.fields_box">'. "\n";
        $i = 0;
        foreach ($tabs as $tab) {
            $html .= '<li';
            if ($i == 0){$html .= ' class="active"'; $i = 1;}
            $html .= '><a href="#' . implode(",", array_slice($tab,1)) . '">'. $tab[0] . '</a></li>' . "\n";
        }
        $html .= '</ul>
            <!-- #/tabs -->';
        //
        return $html;        
    }
}