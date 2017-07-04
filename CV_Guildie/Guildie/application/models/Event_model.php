<?php

Class Event_model extends CI_Model
{

  private $cEvent = null;
  private $CI = null;


  public function __construct()
  {
    parent::__construct();

    $this->CI =&get_instance();
    $this->CI->load->library('package.dbms/simb.guildie.VO/Event');
    $this->CI->load->library('package.bls/simb.guildie.organ/EventService');
    $this->CI->load->model('Notification_model');
    $this->CI->load->model('Activity_model');
  }

  public function insert($data){

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/EventDao');
    $this->load->database();
    $dao = new EventDao($this->db);
    $cEvent = new Event();

    $cEvent->setId($data['id']);
    $cEvent->setTitle($data['title']);
    $cEvent->setDescription($data['description']);
    $cEvent->setType($data['type']);
    $cEvent->setHost_name($data['host_name']);
    $cEvent->setDate_created($data['date_created']);
    $cEvent->setDate_start($data['date_start']);
    $cEvent->setDate_end($data['date_end']);
    $cEvent->setFkaddress($data['fkevent_address_id']);
    $cEvent->setFkcompany($data['fkevent_company_id']);
    $cEvent->setFkuser($data['fkevent_user_id']);

    if ($cEvent->getId()!=0) {
      $dao->update($cEvent);
      $notification = new Notification_Model();
      $notification->createNotification($cEvent, 1);

      $activity = new Activity_model();
      $activity->createActivity($cEvent, 1);

    }else {
      $dao->create($cEvent);
      $notification = new Notification_Model();
      $notification->createNotification($cEvent, 0);

      $activity = new Activity_model();
      $activity->createActivity($cEvent, 0);
    }

  }

  public function retrieve($id)
  {

    $CI =& get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/EventDAO');
    $this->load->database();
    $dao = new EventDAO($this->db);

    $EventService = new EventService();
    $tempObj = $EventService->detail($dao->select($id));

    return $tempObj;
  }

  public function selectAllWhere($att, $value)
  {

    $CI =& get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/EventDao');
    $EventService = new EventService();

    $this->load->database();
    $dao = new EventDao($this->db);

    $eventArray = $EventService->detailArray($dao->selectAllWhere($att, $value));
    return $eventArray;


  }

  public function getAll()
  {

    $CI =& get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/EventDao');
    $this->load->database();
    $dao = new EventDao($this->db);
    $tempArr = $dao->selectAll();

    return $tempArr;
  }

  public function match($query)
  {

    $CI =& get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/EventDao');
    $this->load->database();
    $dao = new EventDao($this->db);

    $EventService = new EventService();
    $tempObj2 = $EventService->detail($dao->match($query));

    return $tempObj2;

  }

}

?>
