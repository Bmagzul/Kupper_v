<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio
{
	protected $ci;

	public function __construct()
	{
        $this->ci =& get_instance();

     	$this->autorizadas = [
     		"/kupper/",
     		"/sesion/iniciar"
     	];
	}

	public function verificar()
	{
		$segmento = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : $_SERVER['REQUEST_URI'];
		
		if (!in_array($segmento, $this->autorizadas)) {
			redirect(base_url());	
		}
	}

}

/* End of file Inicio.php */
/* Location: ./application/hooks/Inicio.php */
