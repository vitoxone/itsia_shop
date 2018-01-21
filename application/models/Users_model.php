<?php

class Users_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function login($username = null, $password = null, $remember = null)
	{
		$this->db
			->select('u.*, p.*, u.username as username')
			->from('users u')
			->join('persons p', 'u.person = p.id_person')
			->where('u.username', $username)
			->where('u.password', $password);

		$consulta = $this->db->get();

		if ($consulta->num_rows() > 0) {
			$row = $consulta->row();
			$this->session->set_userdata('id_user', $row->id_user);
			$this->session->set_userdata('username', $row->username);

			if ($remember == 'true') {
				$this->load->helper('cookie');
				$token  = md5($row->username . time());
				$cookie = array(
					'name'   => 'itsia_token_int',
					'value'  => $token,
					'expire' => 1209600,
					'path'   => '/',
				);
				set_cookie($cookie);
				$this->guardar_token($row->id_user, $token);
			}

		} else {
			return 'El usuario o contraseña son incorrectos';
		}
	}

	public function guardar_token($id, $token)
    {
        $data = array('token' => $token);

        $this->db->where('id_usuario', $id);
        $this->db->update('usuarios', $data);
    }

}
