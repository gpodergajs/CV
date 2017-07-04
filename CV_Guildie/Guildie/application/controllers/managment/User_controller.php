<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends CI_Controller {

	private $data = array();

	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('package.dbms/simb.guildie.VO/User');
		$this->load->model('Db_model');
		$this->load->model('User_model');
		$this->load->model("City_model");
		$this->load->model('Address_model');
		$this->data = $this->data_init();
	}

	public function users(){
		$cUser = new User();

		$tempArr = $this->User_model->selectAllWhere('fkuser_company_id',3); // session needed
		$this->data['users'] = $tempArr;

		$this->load->view('template/head');
		$this->load->view('template/nav/top', $this->data);
		$this->load->view('template/content/begin');
		$this->load->view('template/nav/side');
		$this->load->view('user/overview', $this->data);
		$this->load->view('template/content/end');
		$this->load->view('template/js/init.php');
		$this->load->view('template/foot');
	}

	public function add(){
		if(isset($_POST['user_add'])){

			$dateTemp = date_create($_POST['date_joined']);
			$date = date_format($dateTemp,"Y/m/d H:i:s");

			$data_city = array(
				'name' => $_POST['city'],
				'postcode' => $_POST['post_num'],
				'state_name' => "",
				'country_name' => "",
				'country_ISO' => ""
			);
			$cityID = $this->City_model->insert($data_city); // inserts city and gets id of either lastEntry or established city (so it checks if the entity already exists or not)

			$data_address = array (
				'street' =>  $_POST['address'],
				'street_num' =>  $_POST['house_num'],
				'floor' =>  $_POST['floor'],
				'type' =>  "",
				'fkaddress_city_id' =>  $cityID
			);

			$this->Address_model->insert($data_address);
			$addressID = $this->Address_model->retrieveLastEntry()->getId();

			$data_post = array(
				"id"=>$_POST['user_add'],
				"email"=>$_POST['email'],
				"telephone_num"=>$_POST['telephone_num'],
				"password"=>$_POST['password'],
				"username"=>$_POST['username'],
				"name"=>$_POST['name'],
				"surname"=>$_POST['surname'],
				"position"=>$_POST['position'],
				"state"=>1,
				"date_created"=>$date,
				"date_modified"=>null,
				"date_joined"=>$date,
				"fkuser_role_id"=>null,
				"fkuser_address_id"=>$addressID,
				"fkuser_company_id"=>3   // session needed
			);

			if(!empty($_POST['user_add'])){

				$this->User_model->insert($data_post);
				$this->Users();

			}else {
				$this->User_model->insert($data_post);
				$this->Users();
			}



		}

		if (isset($_POST['add'])) {
			$this->data['user_action'] = "Dodaj novega uporabnika";
		}else if(isset($_POST['edit'])){
			$this->data['user'] = $this->User_model->retrieve($_POST['edit']);
			$this->data['user_action'] = "Uredi uporabnika";
		}else if(isset($_POST['turnOff'])){			
			$cUser = $this->User_model->turnOff($_POST['turnOff']);
			$this->Users();
		}else if(isset($_POST['turnOn'])){
			$cUser = $this->User_model->turnOn($_POST['turnOn']);
			$this->Users();
		}else if(isset($_POST['detail'])){
			$cUser = $this->User_model->retrieve($_POST['detail']);
			$this->data['user_action'] = "Podrobnosti";
			$this->detail();
		}

		$this->load->view('template/head');
		$this->load->view('template/nav/top', $this->data);
		$this->load->view('template/content/begin');
		$this->load->view('template/nav/side');
		$this->load->view('user/add', $this->data);
		$this->load->view('template/content/end');
		$this->load->view('template/js/init.php');
		$this->load->view('template/js/form.php');
		$this->load->view('template/js/datepicker.php');
		$this->load->view('template/foot');

	}

	public function detail()
	{
		$this->data['query'] = null;
		$this->data['user'] = null;


		if(isset($_POST['user_search'])){
			$this->data['user'] = $this->User_model->match($_POST['user_query']);
			$this->data['query'] = $_POST['user_query'];
		}


		if(isset($this->data['user_action'])){
			if($this->data['user_action'] == "Podrobnosti") {
				$this->data['user'] = $this->User_model->retrieve($_POST['detail']);
			}
		}


		$this->load->view('template/head');
		$this->load->view('template/nav/top', $this->data);
		$this->load->view('template/content/begin');
		$this->load->view('template/nav/side');
		$this->load->view('user/detail', $this->data);
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
