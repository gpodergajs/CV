<?php
Class User_model extends CI_Model {


  /* public function controll ($func){

  $switch ($func) {
  case 'value':
  # code...
  break;

  default:
  # code...
  break;
}

}
*/

private $cUser = null;
private $CI = null;

public function __construct(){
  parent::__construct();

  $this->CI =&get_instance();
  $this->CI->load->library('package.dbms/simb.guildie.VO/User');
  $this->CI->load->library('package.dbms/simb.guildie.DAO/UserDao');
  $this->CI->load->library('package.bls/simb.guildie.organ/UserService');
  $this->CI->load->model('Notification_model');
  $this->CI->load->model('Activity_model');

}

public function insert($data){

  $this->load->database();
  $dao = new UserDao($this->db);

  $cUser = new User();
  $cUser->setId($data['id']);
  $cUser->setEmail($data['email']);
  $cUser->setTelephoneNum($data['telephone_num']);
  $cUser->setPassword($data['password']);
  $cUser->setUsername($data['username']);
  $cUser->setName($data['name']);
  $cUser->setSurname($data['surname']);
  $cUser->setPosition($data['position']);
  $cUser->setState($data['state']);
  $cUser->setDateCreated($data['date_created']);
  $cUser->setDateModified($data['date_modified']);
  $cUser->setDateJoined($data['date_joined']);
  $cUser->setFkrole($data['fkuser_role_id']);
  $cUser->setFkaddress($data['fkuser_address_id']);
  $cUser->setFkcompany($data['fkuser_company_id']);


  if($cUser->getId()!=0){
    $dao->update($cUser);
    $notification = new Notification_Model();
    $notification->createNotification($cUser, 1);

    $activity = new Activity_model();
    $activity->createActivity($cUser, 1);
  }else {
    $dao->create($cUser);
    $notification = new Notification_Model();
    $notification->createNotification($cUser, 0);

    $activity = new Activity_model();
    $activity->createActivity($cUser, 0);
  }

}

public function retrieve($id){

  $this->load->database();
  $dao = new UserDao($this->db);

  $Service = new UserService();
  $cUser = $Service->detail($dao->select($id));

  return $cUser;
}

public function selectAllWhere($att,$value){

  $this->load->database();
  $dao = new UserDao($this->db);

  //$Service = new UserService();
  //$cUser = $Service->detailArray($dao->selectAllWhere($att,$value));

  $cUserArray = $dao->selectAllWhere($att,$value);


  return $cUserArray;
}

public function getAll(){

  $this->load->database();
  $dao = new UserDao($this->db);

  $Service = new UserService();
  $cUser = $Service->detailArray($dao->selectAll());

  return $cUser;
}

public function match($query){

  $this->load->database();
  $dao = new UserDao($this->db);

  $Service = new UserService();
  $cUser = $Service->detail($dao->match($query));

  return $cUser;
}


  public function turnOff($id){
    $this->load->database();
    $dao = new UserDao($this->db);

    $Service = new UserService();
    $cUser = $this->retrieve($id);
    $cUser = $Service->turnOff($cUser);
    $dao->update($cUser);
  }


  public function turnOn($id){
    $this->load->database();
    $dao = new UserDao($this->db);

    $Service = new UserService();
    $cUser = $this->retrieve($id);
    $cUser = $Service->turnOn($cUser);
    $dao->update($cUser);

  }

}
?>
