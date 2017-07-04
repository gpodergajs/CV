<?php
  Class Address_model extends CI_Model {

    private $cAddress = null;
    private $CI = null;
    private $dao = null;

   public function __construct(){
    parent::__construct();

    $this->CI =&get_instance();
    $this->CI->load->library('package.dbms/simb.guildie.VO/Address');
    $this->CI->load->library('package.dbms/simb.guildie.DAO/AddressDao');
    $this->CI->load->library('package.bls/simb.guildie.organ/AddressService');
    $this->cAddress = new Address();
  }


    public function retrieveLastEntry(){

      $this->load->database();
      $dao = new AddressDao($this->db);

      return $dao->retrieveLastEntry();

    }


    public function insert($data){

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/AddressDao');
      
      $this->load->database();
      $dao = new AddressDao($this->db);

      $this->cAddress->setStreet($data['street']);
      $this->cAddress->setStreetNum($data['street_num']);
      $this->cAddress->setFloor($data['floor']);
      $this->cAddress->setType($data['type']);
      $this->cAddress->setFkcity($data['fkaddress_city_id']);

      $dao->create($this->cAddress);
	 	}


	 	public function retrieve($id) {

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/AddressDAO');
      $this->load->database();
      $dao = new AddressDAO($this->db);
      $tempObj = $dao->select($id);

      return $tempObj;
	 	}


	  public function selectAllWhere($att,$value){

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/AddressDao');

      $this->load->database();
      $dao = new AddressDao($this->db);

      $tempArr = $dao->selectAllWhere($att,$value);
      return $tempArr;


   }  

    public function getAll() {

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/AddressDao');
      $this->load->database();
      $dao = new AddressDao($this->db);
      $tempArr = $dao->selectAll();
      return $tempArr;


  }


    public function match($query) {

      $CI =&get_instance();
      $CI->load->library('package.dbms/simb.guildie.DAO/AddressDao');
      $this->load->database();
      $dao = new AddressDao($this->db);    
      $tempObj = $dao->match($query);
      return $tempObj;

    }
  }
?>