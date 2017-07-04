<?php

Class Activity_model extends CI_Model{

  private $cActivity = null;
  private $CI = null;


  public function __construct(){

    parent::__construct();

    $this->CI =&get_instance();
    $this->CI->load->library('session');
    $this->CI->load->library('package.dbms/simb.guildie.VO/Activity');
  }

  public function createActivity($cObject, $action){

    $activity = new Activity();
    $activity->setTitle("Nova aktivnost");
    $activity->setDateCreated(new DateTime());
    $activity->setFDateCreated(new DateTime());
    $activity->setLink("link");
    $activity->setFkuser(null);//session user id


    switch (get_class($cObject)) {
      case 'User':
      if($action == 0){
        $activity->setBody("Dodal uporabnika: ".$cObject->getUsername()."");
      }else {
        $activity->setBody("Spremenil uporabnika: ".$cObject->getUsername()."");
      }
      break;

      case 'Event':
      if($action == 0){
        $activity->setBody("Ustvaril dogodek: ".$cObject->getTitle()."");
      }else {
        $activity->setBody("Spremenil dogodek: ".$cObject->getTitle()."");
      }
      break;

      case 'Project':
      if($action == 0){
        $activity->setBody("Ustvaril projekt: ".$cObject->getTitle()."");
      }else {
        $activity->setBody("Spremenil projekt: ".$cObject->getTitle()."");
      }
      break;

      default:
      break;
    }

    if (isset($_SESSION['activity'])) {
      $array = $_SESSION['activity'];
      array_push($array, $activity);
      $_SESSION['activity'] = $array;
    }else {
      $ar = array();
      array_push($ar, $activity);
      $_SESSION['activity'] = $ar;
    }

    //echo print_r($_SESSION['activity']);

    session_regenerate_id();
  }
}

?>
