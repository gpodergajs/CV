<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guildie extends CI_Controller {
	
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	} 

	public function index()
	{	
		$data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
		$data['inspiration'] = 'vsak dan je lahko nov začetek!';
		$data['user_name'] = '@DEVELOPER';
		$data['user_name_abr'] = 'DV';
		
		$this->load->view('template/head');
		$this->load->view('template/nav/top', $data);
		$this->load->view('template/content/begin');
		$this->load->view('template/nav/side');
		$this->load->view('index', $data);
		$this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
		$this->load->view('template/foot');
	}
	
}

?>