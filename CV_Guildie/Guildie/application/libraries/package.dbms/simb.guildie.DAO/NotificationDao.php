<?php
require_once("application/libraries/package.dbms/simb.guildie.DAO/INotificationDAO.php");

class NotificationDAO implements INotificationDAO  {

  protected $db;

  public function __construct(CI_DB_mysqli_driver $db = null){

    $this->db = $db;
  }

  public function create(Notification $cNotification){

    $this->db->insert($cNotification->getTable(), $cNotification->toData($cNotification->getTable()));

    //Checks if a database insert has been a success
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function update(Notification $cNotification){

    $this->db->where('id', $cNotification->getId());
    $this->db->update($cNotification->getTable(), $cNotification->toData($cNotification->getTable()));

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function select(int $key)
  {

    $CI =& get_instance();
    $CI->load->library('simb.guildie.VO/package.dbms/Notification');

    $cNotification = new Notification();

    $this->db->where('id', $key);
    $query = $this->db->get($cNotification->getTable());

    if(!empty(count($query->result_array()))){

      $data = $query->result_array();

      $cNotification = new Notification(
        'PO',
        $data['id'],
        $data['isEmailNotify'],
        $data['isNoticed'],
        $data['isArchived'],
        $data['fknotification_type_id'],
        $data['fknotification_user_id_created'],
        $data['fknotification_user_id_notified'],
        $data['fknotification_message_id']
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
    $this->db->delete('notification');

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

}
?>
