<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Milestone_controller extends CI_Controller {
	
	function __construct() {
		parent::__construct();
		$this->load->helper('url');
	}

	public function milestones()
	{
		$data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
		$data['inspiration'] = 'vsak dan je lahko nov začetek!';
		$data['user_name'] = '@DEVELOPER';
		$data['user_name_abr'] = 'DV';

        $this->load->view('template/head');
        $this->load->view('template/nav/top', $data);
        $this->load->view('template/content/begin');
        $this->load->view('template/nav/side');
        $this->load->view('milestone/overview', $data);
        $this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
        $this->load->view('template/js/form.php');
        $this->load->view('template/js/datepicker.php');
        $this->load->view('template/foot');
	}
	
	public function add()
	{
		$data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
		$data['inspiration'] = 'vsak dan je lahko nov začetek!';
		$data['user_name'] = '@DEVELOPER';
		$data['user_name_abr'] = 'DV';

        $this->load->view('template/head');
        $this->load->view('template/nav/top', $data);
        $this->load->view('template/content/begin');
        $this->load->view('template/nav/side');
        $this->load->view('milestone/add', $data);
        $this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
        $this->load->view('template/js/form.php');
        $this->load->view('template/js/datepicker.php');
        $this->load->view('template/foot');
	}
	
	public function link()
	{
		$data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
		$data['inspiration'] = 'vsak dan je lahko nov začetek!';
		$data['user_name'] = '@DEVELOPER';
		$data['user_name_abr'] = 'DV';

        $this->load->view('template/head');
        $this->load->view('template/nav/top', $data);
        $this->load->view('template/content/begin');
        $this->load->view('template/nav/side');
        $this->load->view('milestone/link', $data);
        $this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
        $this->load->view('template/js/form.php');
        $this->load->view('template/foot');

	}
	
	public function detail()
	{
		$data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
		$data['inspiration'] = 'vsak dan je lahko nov začetek!';
		$data['user_name'] = '@DEVELOPER';
		$data['user_name_abr'] = 'DV';

        $this->load->view('template/head');
        $this->load->view('template/nav/top', $data);
        $this->load->view('template/content/begin');
        $this->load->view('template/nav/side');
        $this->load->view('project/add', $data);
        $this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
        $this->load->view('template/foot');
	}
	
}

?>