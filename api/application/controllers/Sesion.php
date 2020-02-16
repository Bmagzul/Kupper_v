<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sesion extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Sesion_model');
	}

	public function iniciar()
	{
		$datos["exito"] = false;
		$datos["mensaje"] = "Error al intentar ingresar";
		$args = json_decode(file_get_contents('php://input'));

		$usuario = $this->Sesion_model->validar((array)$args);

		if ($usuario) {

			$data = [
				"usuario" 				=> $usuario->usuario,
			    "nombre" 				=> $usuario->nombre,
			    "correo" 				=> $usuario->correo,
			    "alias" 				=> $usuario->alias,
			    "identificacion" 		=> $usuario->identificacion,
			    "telefono" 				=> $usuario->telefono,
			    "direccion" 			=> $usuario->direccion,
			    "foto" 					=> $usuario->foto,
			    "firma" 				=> $usuario->firma,
			    "fecha_reg" 			=> $usuario->fecha_sis,
			    "jefe" 					=> $usuario->jefe,
			    "subjefe" 				=> $usuario->subjefe,
			    "empresa" 				=> $usuario->empresa,
			    "rol" 					=> $usuario->rol,
			    "root" 					=> $usuario->root,
			    "usuario_genero" 		=> $usuario->usuario_genero,
			    "fecha_modificacion" 	=> $usuario->fecha_modificacion
			];

			$jwt = new Json_token();

			$n_jwt = $jwt->generarToken(["datos" => $data]);

			if ($n_jwt) {
				$datos["exito"] 	 = true;
				$datos["mensaje"] 	 = "Sesion iniciada correctamente.";
				$datos["usuario"]    = $data;
				$datos["userToken"]  = $n_jwt;
			}
		}

		$this->output
			 ->set_content_type('application/json')
			 ->set_output(json_encode($datos));
		
	}

}
?>