<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Generic
{
	 /**
	 * Gets the field types of the main table.
	 * @return array
	 */
	private $CI;
	public $idUuser;
	public $nivelUsuario="";	
	function __construct($user="")
	{	 
	   	 $this->CI =& get_instance();
         $this->CI->load->database();
		 $this->idUuser=$user;	
		 
	}		
	public function getDataTable($param){
	   $campos="*";
	   if(isset($param["campos"]))$campos=$param["campos"];	  
	   if(isset($param["tabla"])) $tabla=$param["tabla"];	   	  	  	 		
	   $this->CI -> db-> select($campos);
	   $this->CI -> db-> from($tabla);
	   if(isset($param["join"]))  $this -> CI -> db ->join($param["join"]);
	   if(isset($param["condicion"])) $this ->CI -> db -> where($param["condicion"]);
	   if(isset($param["order"])) $this-> CI -> db -> order_by($param["order"]);	   
	   $query = $this-> CI -> db -> get();
	   if(isset($param["depuracion"]) and $param["depuracion"]=="SI"){
		   echo  $this->CI->db->get_compiled_select($tabla);			
	   }	   	   
	   if($query -> num_rows()> 0)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
		
	}	
	public function executeQuery($sql){		
		if(!empty($sql)){
			$query=$this->CI->db->query($sql);			
			if($query -> num_rows()> 0)
				 return $query->result();
			else 
				return false;
		}
		else
			return false;
		
	}
	public function getMenu(){
		$user=$this->executeQuery("select nivelusuario from usuarios where idusuario=".$this->idUuser."");			
		$this->nivelUsuario=$user[0]->nivelusuario;		
		$parametrosMod=array("tabla"=>"modulos","depuracion"=>"NO","condicion"=>"(idModuloPadre IS NULL or idModuloPadre=0) and mostrarenMenu='S' and nivelUsuario=".$this->nivelUsuario."");
		$menus=$this->getDataTable($parametrosMod);
		if($menus){
			foreach($menus as $indice => $menu){
					$idmodulo=$menu->idModulo;									
					$submenus=$this->getSubModulos($idmodulo); 
					if($submenus) 
						$menus[$indice]->sub=$submenus;
			}
			return  $menus;
		}
		else
			return false;
	}
	public function verificaModulo($id){
		$user=$this->executeQuery("select nivelusuario from usuarios where idusuario=".$this->idUuser."");			
		$this->nivelUsuario=$user[0]->nivelusuario;		
		$parametrosMod=array("tabla"=>"modulos","depuracion"=>"NO","condicion"=>"idModulo=".$id." and nivelUsuario=".$this->nivelUsuario."");
		$modulos=$this->getDataTable($parametrosMod);
		if($modulos){			
			return  $modulos[0]->archivoModulo;
		}
		else
			return false;
	}
	public function getSubModulos($idmodulo=""){			
		$parametrosSub=array("tabla"=>"modulos","depuracion"=>"NO","condicion"=>"idModuloPadre=".$idmodulo." and nivelUsuario=".$this->nivelUsuario."");			
		$submodulos=$this->getDataTable($parametrosSub); 
		if($submodulos)
			return $submodulos;
		else 
			return false;
	}
	public function getPermisos($idModulo){ 
		$user=$this->executeQuery("select nivelusuario from usuarios where idusuario=".$this->idUuser."");			
		$this->nivelUsuario=$user[0]->nivelusuario;
		$permisos=$this->executeQuery("select * from permisosModulos 
									   left join permisos on permisos.idPermisos=permisosModulos.idPermiso 
									   left join modulos on modulos.idModulo=permisosModulos.idModulo
									   where idNivelUsuario=".$this->nivelUsuario." and permisosModulos.idModulo=".$idModulo." order by permisosModulos.orden");	
		if($permisos){			
			return $this->generaAcciones($permisos,$idModulo);
		}
		else 
			return false;
	}
	function generaAcciones($permisos,$idModulo){
		if($permisos){
			$i=0;	
			$acciones="";
			$acciones.='<div class="btn-group text-center">'; 					                    		      
			foreach($permisos as $indice => $registro){
				$i++;
				$acciones.= '<button type="button" data-modulo="'.$registro->archivoModulo.'" data-accion="'.$registro->accion.'"  class="btn btn-'.$registro->tipoboton.' btn-md navbar-btn operaciones">
					   			<span class="glyphicon glyphicon-'.$registro->iconopermiso.'" aria-hidden="true"></span>'.$registro->permiso.'
					  		</button>';	
			}
			$acciones.="</div>";
			
			return $acciones;
		}
		else 
			return false;
	}
	public function loadForm($archivo){
		
	}

}
