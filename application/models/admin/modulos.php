<?php
Class Modulos extends CI_Model
{
 function getModulos()
 {
   $this -> db -> select('modulo,info,glyphicon');
   $this -> db -> from('modulos');
   $this -> db -> where('activo','S');

   $query = $this -> db -> get();
   $usuario=$query->result();
   if($query -> num_rows() > 0)
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