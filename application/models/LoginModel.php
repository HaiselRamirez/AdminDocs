<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginModel extends CI_Model {

	public function entrar($user, $pass)
	{
		try {
			$this->db->select('u.usr_id id, u.usr_usuario user, u.usr_clave pass, u.usr_nombre nombre, u.usr_email correo, u.usr_foto foto, r.rol_name rol, r.rol_desc funcion, c.cam_codigo code_camp, c.cam_nombre campus');
			$this->db->from('usuario u');
			$this->db->join('roles r', 'r.rol_id = u.usr_rol_id');
			$this->db->join('campus c', 'c.cam_id = u.usr_cam_id');
			$this->db->where('u.usr_usuario', $user);
			$this->db->where('u.usr_clave', $pass);
			$query  = $this->db->get();
			if($query->num_rows()> 0){
				return $query->row();
			}else{
				return false;
			}
		} catch (Exception $e) {
			return $e.mssql_get_last_message();
		}
	}
}

/* End of file LoginModel.php */
/* Location: ./application/models/LoginModel.php */