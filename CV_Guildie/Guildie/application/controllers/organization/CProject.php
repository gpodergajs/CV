<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CProject extends CI_Controller {

  private $data = array();

  function __construct() {
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('MProject');
    $this->data = $this->data_init();
  }

  public function projects()
  {

    $project_list = $this->MProject->selectAllWhere('fkproject_company_id', 3);

    $this->data['projects'] = $project_list;

    $this->load->view('template/head');
    $this->load->view('template/nav/top', $this->data);
    $this->load->view('template/content/begin');
    $this->load->view('template/nav/side');
    $this->load->view('project/overview', $this->data);
    $this->load->view('template/content/end');
    $this->load->view('template/js/init.php');
    $this->load->view('template/js/dragAndDrop.php');
    $this->load->view('template/foot');

  }

  public function table()
  {
    $project_list = $this->MProject->selectAllWhere('fkproject_company_id', 3);

    $activeProject_list = array();
    $archivedProject_list = array();

    foreach ($project_list as $project) {

      if($project->getStateNum() == 1){
        array_push($activeProject_list, $project);
      }

      if($project->getStateNum() == 0){//state_num samo zaradi testiranja da kaj izpiše
        array_push($archivedProject_list, $project);
      }
      /*
      if($project->getIsArchive() == 1){
      array_push($archivedProject_list, $project);
    }
    */

  }


  $this->data['active_projects'] = $activeProject_list;
  $this->data['archived_projects'] = $archivedProject_list;
  $this->load->view('template/head');
  $this->load->view('template/nav/top', $this->data);
  $this->load->view('template/content/begin');
  $this->load->view('template/nav/side');
  $this->load->view('project/table', $this->data);
  $this->load->view('template/content/end');
  $this->load->view('template/js/init.php');
  $this->load->view('template/foot');
}

public function add()
{
  $this->load->model('MProject');
  $this->data['data_measurement'] =  $this->MProject->retrieve_measurement(3);

  if(isset($_POST['project_add'])){

    $data_post['cProject']  = array(
      "title" => $_POST['title'],
      "description" => $_POST['description'],
      "priority" => $_POST['priority'],
      "date_deadline" => $_POST['date_deadline'] . ' ' . date("H:i:s"),
      "value_num" => 0,
      "value_num_max" => $_POST['value_num_max'],
      "measurement_name" => $_POST['measurement_name'],
      "fkcompany_id" => 3,
      "fkuser_id" => 64
    );

    return $this->projects();
  }

  $this->load->view('template/head');
  $this->load->view('template/nav/top', $this->data);
  $this->load->view('template/content/begin');
  $this->load->view('template/nav/side');
  $this->load->view('project/add', $this->data);
  $this->load->view('template/content/end');
  $this->load->view('template/js/init.php');
  $this->load->view('template/js/form.php');
  $this->load->view('template/js/datepicker.php');
  $this->load->view('template/js/task.php');
  $this->load->view('template/foot');
}

public function detail()
{
  $cProject = $this->MProject->retrieve($_POST['detail']);
  $this->data['cProject'] = $cProject;

  $this->load->view('template/head');
  $this->load->view('template/nav/top', $this->data);
  $this->load->view('template/content/begin');
  $this->load->view('template/nav/side');
  $this->load->view('project/detail', $this->data);
  $this->load->view('template/content/end');
  $this->load->view('template/js/init.php');
  $this->load->view('template/foot');
}

private function data_init(){

  $data['heading'] = '<i class="fa fa-tachometer" aria-hidden="true"></i> Kontrolna plošča';
  $data['inspiration'] = 'vsak dan je lahko nov začetek!';
  $data['user_name'] = '@DEVELOPER';
  $data['user_name_abr'] = 'DV';

  return $data;

}


}

?>
