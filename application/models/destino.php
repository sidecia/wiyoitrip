<?php
Class Destino extends CI_Model
{
	
  function get_usuario($id){
	   $this -> db -> select('*');
	   $this -> db -> from('usuarios');
	   $this -> db -> where('idusuario', $id);
	   $this -> db -> limit(1);
	   $query = $this -> db -> get();
	   $usuario=$query->result();
	   if($query -> num_rows() == 1)
	   {
		 return $query->result();
	   }
	   else
	   {
		 return false;
	   }
  }
}
?>