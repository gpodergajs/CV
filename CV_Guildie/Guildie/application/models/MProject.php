<?php defined('BASEPATH') OR exit('No direct script access allowed');

Class MProject extends CI_Model
{

    private $CI = null;
    private $dmsProject = null;

    private $cProject = null;

    public function __construct()
    {
        parent::__construct();

        $this->CI =& get_instance();
        $this->CI->load->library('package.dbms/simb.guildie.VO/Project');
        $this->CI->load->library('package.dbms/simb.guildie.DAO/ProjectDAO');
        $this->CI->load->library('package.bls/simb.guildie.organ/ProjectService');

        $this->load->database();
    }

    public function insert($data)
    {

        $this->setDmsProject(new ProjectDAO($this->db));

        $this->setCProject(
            new Project(
                'PO',
                0,
                $data["title"],
                $data["description"],
                $data['priority'],
                0,
                null,
                $data['date_deadline'],
                $data['value_num'],
                $data['value_num_max'],
                $data['measurement_name'],
                0,
                0,
                0,
                $data['fkcompany_id'],
                $data['fkuser_id'])
        );

        $this->getDmsProject()->create($this->getCProject());

        $this->clean();
    }

    public function retrieve_measurement($fkcompany_id)
    {

        $this->setDmsProject(new ProjectDAO($this->db));

        $data = $this->getDmsProject()->select_data_measurement($fkcompany_id);

        return $data;
    }

    public function retrieve($id)
    {
      $CI =& get_instance();
      $this->load->database();
      $dao = new ProjectDAO($this->db);

      $tempObj = $dao->select($id);

      return $tempObj;

/*
        $this->load->model('Db_model');
        $conn = $this->Db_model->conn;
        $stmt = $conn->prepare("select * from projects where idprojects = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);


        $this->load->model('MProject');
        $tempProject = new MProject($result['idprojects'], $result['fkcompany_idcompany'], $result['fkmilestones_idmilestones'], $result['fk_unit_type_idunit_type'], $result['title'], $result['value_num'], $result['value_perc'], $result['date_end'], $result['state']);


        return $tempProject;
        */

    }


    public function retrieve_att($att, $value)
    {

        $this->load->model('Db_model');
        $conn = $this->Db_model->conn;
        $stmt = $conn->prepare("select * from projects where " . $att . " = :value");
        $stmt->bindParam(':value', $value);
        $stmt->execute();
        //$result = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->load->model('MProject');

        $arr = array();

        while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

            $tempProject = new MProject($result['idprojects'], $result['fkcompany_idcompany'], $result['fkmilestones_idmilestones'], $result['fkunit_type_idunit_type'], $result['title'], $result['value_num'], $result['value_perc'], $result['date_end'], $result['state']);

            array_push($arr, $tempProject);

        }
        return $arr;
    }

    private function clean(){

        $this->setDmsProject(null);
        $this->setCProject(null);

    }

    /**
     * @return ProjectDAO
     */
    public function getDmsProject()
    {
        return $this->dmsProject;
    }

    /**
     * @param ProjectDAO $dmsProject
     */
    public function setDmsProject($dmsProject)
    {
        $this->dmsProject = $dmsProject;
    }

    /**
     * @return Project
     */
    public function getCProject()
    {
        return $this->cProject;
    }

    /**
     * @param Project $cProject
     */
    public function setCProject($cProject)
    {
        $this->cProject = $cProject;
    }

    public function selectAllWhere($att,$value){

    $this->load->database();
    $dao = new ProjectDAO($this->db);

    $cProjectArray = $dao->selectAllWhere($att,$value);

    return $cProjectArray;
    }


}


?>
