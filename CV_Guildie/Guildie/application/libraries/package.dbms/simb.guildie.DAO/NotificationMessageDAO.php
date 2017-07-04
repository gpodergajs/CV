<?php

require_once("application/libraries/package.dbms/simb.guildie.DAO/INotificationMessageDAO.php");

class NotificationMessageDAO implements INotificationMessageDAO  {

  protected $db;

  public function __construct(CI_DB_mysqli_driver $db = null){

    $this->db = $db;
  }

  public function create(NotificationMessage $cNotificationMessage){

    $this->db->insert($cNotificationMessage->getTable(), $cNotificationMessage->toData($cNotificationMessage->getTable()));

    //Checks if a database insert has been a success
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function update(NotificationMessage $cNotificationMessage){

    $this->db->where('id', $cNotificationMessage->getId());
    $this->db->update($cNotificationMessage->getTable(), $cNotificationMessage->toData($cNotificationMessage->getTable()));

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function select(int $key)
  {

    $CI =& get_instance();
    $CI->load->library('simb.guildie.VO/package.dbms/NotificationMessage');

    $cNotificationMessage = new NotificationMessage();

    $this->db->where('id', $key);
    $query = $this->db->get($cNotificationMessage->getTable());

    if(!empty(count($query->result_array()))){

      $data = $query->result_array();

      $cNotificationMessage = new NotificationMessage(
        'PO',
        $data['id'],
        $data['title_html'],
        $data['message_html'],
        $data['link'],
        $data['date_created'],
        $data['priority']
      );

    }else{
      return null;
    }

  }


  public function selectAll(){

    //še bom naredil

  }

  function delete(int $key)
  {

    $this->db->where('id', $key);
    $this->db->delete('notification_message');

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

}
?>
