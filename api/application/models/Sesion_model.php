<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function validar($args=[])
	{
		$tmp = $this->db->where('alias', $args["usuario"])
				   		->where('password', sha1($args["password"]))
				   		->where('activo', 1)
				   		->get('usuario')
				   		->row();

		return $tmp;
	}
}
?>