<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("IProjectDAO.php");

/**
* Class ProjectDAO
*/
class ProjectDAO implements IProjectDAO{

  protected $db;

  public function __construct(CI_DB_mysqli_driver $db = null)
  {
    $this->db = $db;
  }

  public function create(Project $cProject)
  {

    $this->db->insert($cProject->getTable(), $cProject->toData());
    //Checks if a database insert has been a success
    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function update(Project $cProject)
  {

    $this->db->where('id', $cProject->getId());
    $this->db->update($cProject->getTable(), $cProject->toData());

    if ($this->db->affected_rows() > 0) {
      return true;
    } else {
      return false;
    }

  }

  public function select(int $key)
  {

    $CI =& get_instance();
    $CI->load->library('simb.guildie.VO/package.dbms/Project');

    $cProject = new Project();

    $this->db->where('id', $key);
    $query = $this->db->get($cProject->getTable());

    if(!empty(count($query->result_array()))){

      $cProject = new Project();

      foreach ($query->result_array() as $data) {

        $cProject->setId($data["id"]);
        $cProject->setTitle($data['title']);
        $cProject->setDescription($data['description']);
        $cProject->setPriority($data['priority']);
        $cProject->setDateDeadline($data['date_deadline']);
        $cProject->setValueNum($data['value_num']);
        $cProject->setValueNumMax($data['value_num_max']);
        $cProject->setMeasurementName($data['measurement_name']);
        $cProject->setIsClosed($data['isClosed']);
        $cProject->setIsArchive($data['isArchive']);
        $cProject->setIsSmart($data['isSmart']);
        $cProject->setFkcompany_id($data['fkproject_company_id']);
        $cProject->setFkuser_id($data['fkproject_user_id']);
      }

      return $cProject;

    }
  }

  public function selectAll(){

  }

  public function selectAllWhere($att,$value){
    $CI =& get_instance();
    $CI->load->library('simb.guildie.VO/package.dbms/Project');

    // limited to 50 results
    $query = $this->db->select('*')->where($att,$value)->order_by("date_deadline","asc")->limit(50)->get('project');

    $projectArray = array();

    foreach ($query->result_array() as $data) {

      $cProject = new Project();
      $cProject->setId($data["id"]);
      $cProject->setTitle($data['title']);
      $cProject->setDescription($data['description']);
      $cProject->setPriority($data['priority']);
      $cProject->setDateDeadline($data['date_deadline']);
      $cProject->setValueNum($data['value_num']);
      $cProject->setValueNumMax($data['value_num_max']);
      $cProject->setMeasurementName($data['measurement_name']);
      $cProject->setIsClosed($data['isClosed']);
      $cProject->setIsArchive($data['isArchive']);
      $cProject->setIsSmart($data['isSmart']);
      $cProject->setFkcompany_id($data['fkproject_company_id']);
      $cProject->setFkuser_id($data['fkproject_user_id']);
      array_push($projectArray, $cProject);
    }

    return $projectArray;
  }


function delete(int $key)
{

  $this->db->where('id', $key);
  $this->db->delete('project');

  if ($this->db->affected_rows() > 0) {
    return true;
  } else {
    return false;
  }

}

public function select_data_measurement(int $key)
{

  $this->db->select('measurement_name');
  $this->db->from('project');
  $this->db->where('fkproject_company_id', $key);
  $query = $this->db->get();

  if(!empty(count($query->row_array()))){
    return $query->row_array();
  } else {
    return null;
  }

}
}
