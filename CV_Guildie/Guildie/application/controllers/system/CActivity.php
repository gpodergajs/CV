<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CActivity extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->data = $this->data_init();
    }

    public function activities()
    {

        $project_list = $this->MProject->selectAllWhere('fkproject_company_id', 3);

        $this->data['projects'] = $project_list;

        $this->load->view('template/head');
        $this->load->view('template/nav/top', $this->data);
        $this->load->view('template/content/begin');
        $this->load->view('template/nav/side');
        $this->load->view('activity/overview', $this->data);
        $this->load->view('template/content/end');
        $this->load->view('template/js/init.php');
        $this->load->view('template/foot');

    }

    private function data_init(){

        $data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
        $data['inspiration'] = 'vsak dan je lahko nov začetek!';
        $data['user_name'] = '@DEVELOPER';
        $data['user_name_abr'] = 'DV';

        return $data;

    }


}

?>
