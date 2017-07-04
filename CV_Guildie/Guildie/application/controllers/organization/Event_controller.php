<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_controller extends CI_Controller {

	private $data = array();

	function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('package.dbms/simb.guildie.VO/Event');
		$this->load->library("package.dbms/simb.guildie.DAO/AddressDao");
		$this->load->library("package.dbms/simb.guildie.DAO/CityDao");
		$this->load->model('Event_model');
		$this->load->model('Db_model');
		$this->load->model('City_model');
		$this->load->model('Address_model');
		$this->data = $this->data_init();
	}

	public function events()
	{
		$tmpAddressArr = array();
		$tmpCityArr = array();

		$cEvent = new Event();
		$tempEventArr = $this->Event_model->selectAllWhere('fkevent_company_id',3); // needs session id of company

		$tempDateArr1 = array();
		$tempDateArr2 = array();
		$tDateArrayYear1 = array();
		$tDateArrayYear2 = array();

		foreach ($tempEventArr as $event) {

			$t = $this->Address_model->retrieve($event->getFkaddress());
			$fk = $t->getFkcity();
			array_push($tmpAddressArr, $this->Address_model->retrieve($event->getFkaddress()));
			array_push($tmpCityArr, $this->City_model->retrieve($fk));
			array_push($tDateArrayYear1, date_format(date_create($event->getDate_start()),"Y-m-d"));
			array_push($tempDateArr1, $event->getDate_start());
		}

		// extrude duplicate values
		$tempDateArr2 = array_unique($tempDateArr1);
		$tDateArrayYear2 =array_unique($tDateArrayYear1);
		$n=0;

		$tLocationArr = array();

		foreach ($tempEventArr as $event) {
			$event->setLocation($tmpAddressArr[$n],$tmpCityArr[$n]);
			array_push($tLocationArr, $event->getLocation());
			$n++;
		}

		//$t = array_unique($tLocationArr);
		$this->data['years'] = $tDateArrayYear2;
		$this->data['dates'] = $tempDateArr2;
		$this->data['events'] = $tempEventArr;
		$this->data['location_data'] = $tLocationArr;

		//echo json_encode(array_unique($tLocationArr));

		$this->load->view('template/head');
		$this->load->view('template/nav/top', $this->data);
		$this->load->view('template/content/begin');
		$this->load->view('template/nav/side');
		$this->load->view('event/overview', $this->data);
		$this->load->view('template/content/end');
		$this->load->view('template/js/init.php');
		$this->load->view('template/js/map.php', $this->data);
		$this->load->view('template/foot');
	}

	public function add()
	{
		if(isset($_POST['event_add'])){

			$dateTemp = date_create($_POST['date_start']);
			$date = date_format($dateTemp,"Y/m/d H:i:s");
			/*
			$dateStart = date_create($_POST['date_start']." ".$_POST['time_start']);
			$dateEnd = date_create($_POST['date_end']." ".$_POST['time_end']);
			*/

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
				'id' =>$_POST['event_add'],
				'title' => $_POST['title'],
				'description' => $_POST['description'],
				'type' => $_POST['type'],
				'host_name' => $_POST['host_name'],
				'date_created' => $date,
				/*
				'date_start' => date_format($dateStart,"Y-m-d H:i:s"),
				'date_end' =>date_format($dateEnd,"Y-m-d H:i:s"),
				*/
				'date_start' => $date,
				'date_end' => $date,
				'fkevent_address_id' => $addressID,
				'fkevent_company_id' => 3,
				'fkevent_user_id' => 66);

				if (!empty($_POST['event_add'])) {
					$this->Event_model->insert($data_post);
					$this->events();

				}else {
					$this->Event_model->insert($data_post);
					$this->events();

				}
			}

			if (isset($_POST['add'])){
				$this->data['event_action'] = "Ustvari nov dogodek";

			}else if(isset($_POST['edit'])){
	

				$this->data['event'] = $this->Event_model->retrieve($_POST['edit']);
				$this->data['event_action'] = "Uredi dogodek";
			}else if (isset($_POST['detail'])){
				$cEvent = $this->Event_model->retrieve($_POST['detail']);
				$this->data['event_action'] = "Podrobnosti";
				$this->detail();

			}

			$this->load->view('template/head');
			$this->load->view('template/nav/top', $this->data);
			$this->load->view('template/content/begin');
			$this->load->view('template/nav/side');
			$this->load->view('event/add', $this->data);
			$this->load->view('template/content/end');
			$this->load->view('template/js/init.php');
			$this->load->view('template/js/form.php');
			$this->load->view('template/js/datepicker.php');
			$this->load->view('template/foot');
		}

		public function detail()
		{

			
			if(isset($_POST['event_search'])){

				$value = $_POST['event_query'];
				$tmpEvent = $this->Event_model->match($value);
				$tmpAddress = $this->Address_model->retrieve($tmpEvent->getFkaddress());
				$tmpCity = $this->City_model->retrieve($tmpAddress->getFkcity());

				$this->data['address'] = $tmpAddress;
				$this->data['city'] = $tmpCity;
				$this->data['cEvent'] = $tmpEvent;
				$this->data['query'] = $value;

			}else

			if(isset($this->data['event_action'])){
				if($this->data['event_action'] == "Podrobnosti") {
					$this->data['cEvent'] = $this->Event_model->retrieve($_POST['detail']);
					$this->data['address'] = $this->Address_model->retrieve($this->data['cEvent']->getFkaddress());
					$this->data['city'] = $this->City_model->retrieve($this->data['address']->getFkcity());
				}
			}


			$this->load->view('template/head');
			$this->load->view('template/nav/top', $this->data);
			$this->load->view('template/content/begin');
			$this->load->view('template/nav/side');
			$this->load->view('event/detail', $this->data);
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
