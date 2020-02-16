<?php defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH.'/libraries/vendor/autoload.php';
use \Firebase\JWT\JWT;

Class Test extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}