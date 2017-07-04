<?php
Class Notification_model extends CI_Model {

  private $cNotification = null;
  private $CI = null;


  public function __construct()
  {
    parent::__construct();
    $this->CI =&get_instance();
    $this->CI->load->library('package.dbms/simb.guildie.VO/Notification');
    $this->CI->load->model('NotificationMessage_model');
    $this->CI->load->model('User_model');

  }

  public function createNotification($cObject, $action){

    $nmModel = new NotificationMessage_model();
    $userModel = new User_model();
    $userArray = $userModel->selectAllWhere("fkuser_company_id", 3);

    $notificationMessage = new NotificationMessage();
    $notificationMessage->setTitleHtml("<p>Novo obvestilo</p>");

    switch (get_class($cObject)) {//glede na objekt ustvari sporočilo
      case 'User':
        if($action == 0){
          $notificationMessage->setMessageHtml("<p>Dodan uporabnik: ".$cObject->getUsername()."</p>");
        }else {
          $notificationMessage->setMessageHtml("<p>Spremenjen uporabnik: ".$cObject->getUsername()."</p>");
        }
      break;

      case 'Event':
        if($action == 0){
          $notificationMessage->setMessageHtml("<p>Dodan dogodek: ".$cObject->getTitle()."</p>");
        }else {
          $notificationMessage->setMessageHtml("<p>Spremenjen dogodek: ".$cObject->getTitle()."</p>");
        }
      break;

      case 'Project':
      break;

      default:
      break;
    }

    $notificationMessage->setLink("Link");
    $notificationMessage->setDateCreated(null);
    $notificationMessage->setPriority(1);

    $nmModel->insert($notificationMessage->toData('notificationMessage'));

    $tempMessage = $nmModel->retrieveLastEntry();//zadnji dodan message
    $id = $tempMessage->getId();

    foreach ($userArray as $user){

      $cNotification = new Notification();
      $cNotification->setIsEmailNotify(0);
      $cNotification->setIsNoticed(0);
      $cNotification->setIsArchived(0);
      $cNotification->setFktype(null);
      $cNotification->setFkcreated(null);
      $cNotification->setFknotified($user->getId());
      $cNotification->setFkmessage($id);

      $this->insert($cNotification->toData('notification'));
    }

  }

  public function insert($data){

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationDAO');
    $this->load->database();
    $dao = new NotificationDao($this->db);
    $cNotification = new Notification();

    $cNotification->setIsEmailNotify($data['isEmailNotify']);
    $cNotification->setIsNoticed($data['isNoticed']);
    $cNotification->setIsArchived($data['isArchived']);
    $cNotification->setFktype($data['fknotification_type_id']);
    $cNotification->setFkcreated($data['fknotification_user_id_created']);
    $cNotification->setFknotified($data['fknotification_user_id_notified']);
    $cNotification->setFkmessage($data['fknotification_message_id']);

    $dao->create($cNotification);

  }


  public function retrieve($id) {

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationDAO');
    $this->load->database();
    $dao = new NotificationDAO($this->db);
    $tempObj = $dao->select($id);

/*
    $NotificationService = new NotificationService();
    $tempObj = $NotificationService->detail($dao->select($id));
    */

    return $tempObj;
  }


  public function selectAllWhere($att,$value){

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationDAO');

    $this->load->database();
    $dao = new NotificationDao($this->db);

    $notificationArray = $dao->selectAllWhere($att, $value);

    return $notificationArray;
  }

  public function getAll() {

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationDAO');
    $this->load->database();
    $dao = new NotificationDao($this->db);
    $tempArr = $dao->selectAll();
    
    return $tempArr;
  }

}
?>
