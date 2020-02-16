<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH."libraries/vendor/autoload.php";
use \Firebase\JWT\JWT;

class Json_token
{
	protected $ci;
	private $clave = "Kupper123**";

	public function __construct()
	{
        $this->ci =& get_instance();
	}

	public function generarToken(Array $args)
	{
		$tokenId    = base64_encode(mcrypt_create_iv(32));
	    $usadoA   = time();
	    $limite  = $usadoA + 10;             // Agregando 10 segundos
	    $expira     = $limite + 60;            // Agregando 60 segundos
		$serverName = base_url();

	    $data = [
			'iat'  => $usadoA,         // Issued at: tiempo en el que se genero el token
			'jti'  => $tokenId,          // Json Token Id: identificador unico del token
			'iss'  => $serverName,       // Quien lo usa
			'nbf'  => $limite,        // Tiempo limite
			'exp'  => $expira,           // Expira
			'data' => isset($args["datos"]) ? $args["datos"]: [] // Datos relacionados al usuario
	    ];

	    $jwt = JWT::encode(
			$data,      // Datos a encriptar en JWT
			$this->clave, // Clave secreta
	    	'HS512'     // Algoritmo encriptado
	    );

	    if ($jwt) {
			return $jwt;
	    }

	    return false;
	}

	public function validarToken($value='')
	{
		
	}

	public function anularToken($value='')
	{
		
	}

}
?>