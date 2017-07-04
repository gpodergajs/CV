<?php
Class NotificationMessage_model extends CI_Model {

  private $cNotificationMessage = null;
  private $CI = null;


  public function __construct()
  {
    parent::__construct();

    $this->CI =&get_instance();
    $this->CI->load->library('package.dbms/simb.guildie.VO/NotificationMessage');
  }


  public function insert($data){

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationMessageDAO');
    $this->load->database();
    $dao = new NotificationMessageDAO($this->db);
    $cNotificationMessage = new NotificationMessage();

    $cNotificationMessage->setTitleHtml($data['title_html']);
    $cNotificationMessage->setMessageHtml($data['message_html']);
    $cNotificationMessage->setLink($data['link']);
    $cNotificationMessage->setDateCreated($data['date_created']);
    $cNotificationMessage->setPriority($data['priority']);

    $dao->create($cNotificationMessage);
  }


  public function retrieve($id) {

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationMessageDAO');
    $this->load->database();
    $dao = new NotificationMessageDAO($this->db);

    $tempObj = $dao->select($id);

    return $tempObj;
  }


  public function selectAllWhere($att,$value){

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationMessageDAO');
    $NotificationService = new NotificationService();

    $this->load->database();
    $dao = new NotificationMessageDao($this->db);

    $notificationMessageArray = $dao->selectAllWhere($att, $value);

    return $notificationMessageArray;
  }

  public function getAll() {

    $CI =&get_instance();
    $CI->load->library('package.dbms/simb.guildie.DAO/NotificationMessageDAO');
    $this->load->database();
    $dao = new NotificationMessageDao($this->db);
    $tempArr = $dao->selectAll();

    return $tempArr;
  }

  public function retrieveLastEntry(){

    $CI =& get_instance();
    $CI->load->library('package.dbms/simb.guildie.VO/NotificationMessage');
    $cNotificationMessage = new NotificationMessage();

    $query=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('notification_message');

    foreach ($query->result_array() as $data){

      $cNotificationMessage->setId($data['id']);
      $cNotificationMessage->setTitleHtml($data['title_html']);
      $cNotificationMessage->setMessageHtml($data['message_html']);
      $cNotificationMessage->setLink($data['link']);
      $cNotificationMessage->setDateCreated($data['date_created']);
      $cNotificationMessage->setPriority($data['priority']);

    }

    return $cNotificationMessage;
  }
}
?>
