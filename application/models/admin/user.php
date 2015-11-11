<?php
Class User extends CI_Model
{
 function login($username, $password)
 {
   $this -> db -> select('idusuario,nombre,apellidopaterno,apellidomaterno,usuario,nivelusuario,password');
   $this -> db -> from('usuarios');
   $this -> db -> where('usuario', $username);
   $this -> db -> limit(1);

   $query = $this -> db -> get();
   $usuario=$query->result();
   if($query -> num_rows() == 1 and $usuario[0]->password==MD5($password))
   {
     return $query->result();
   }
   else
   {
     return false;
   }
 }
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