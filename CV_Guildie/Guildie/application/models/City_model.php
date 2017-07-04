<?php
  Class City_model extends CI_Model {


    private $cCity = null;
    private $CI = null;

   public function __construct(){
    parent::__construct();

    $this->CI =&get_instance();
    $this->CI->load->library('package.dbms/simb.guildie.VO/City');
    $this->CI->load->library('package.dbms/simb.guildie.DAO/CityDao');
    $this->CI->load->library('package.bls/simb.guildie.organ/CityService');

  }

    public function insert($data){

      $this->load->database();
      $dao = new CityDao($this->db);

      //var_dump($data);

      $CityService = new CityService();
      $cCity = new City();

      $cCity->setName($data['name']);
      $cCity->setPostcode($data['postcode']);
      $cCity->setStateName($data['state_name']);
      $cCity->setCountryName($data['country_name']);
      $cCity->setCountryISO($data['country_ISO']);


      // gets directive for switch statement
      $action = $CityService->analyze($cCity);

      switch ($action) {
     
        case 'false': // if city doesnt exist
        $dao->create($cCity); // insert city
        return $this->retrieveLastEntry()->getId(); // return id of last entry
        break;
        default: // if city exists
        return $action; // return id of that city
        break;
      }

	 	}

    public function retrieveLastEntry () {

        $this->load->database();
        $dao = new CityDAO($this->db);
        $lastEntry = new City();
        $lastEntry = $dao->retrieveLastEntry();
        //var_dump($lastEntry);
        return $lastEntry;
    }



	 	public function retrieve($id) {

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/CityDAO');
      $this->load->database();
      
      $dao = new CityDAO($this->db);
      $cCity = new City();

      $cCity = $dao->select($id);
      //var_dump($cCity);
      return $cCity;
	 	}


	  public function selectAllWhere($att,$value){

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/CityDao');

      $this->load->database();
      $dao = new CityDao($this->db);

      $tempArr = $dao->selectAllWhere($att,$value);
      return $tempArr;


   }  

    public function getAll() {

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/CityDao');
      $this->load->database();
      $dao = new CityDao($this->db);
      $tempArr = $dao->selectAll();
      return $tempArr;


  }


    public function match($query) {



      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/CityDao');
      $this->load->database();
      $dao = new CityDao($this->db);    
      $tempObj = $dao->match($query);
      return $tempObj;

    }
  }
?>