<?php defined('BASEPATH') OR exit('No direct script access allowed');

require_once("VOAbstract.php");

class Project extends VOAbstract {

    /**
     * @var int $id Id with options PK, NN, AI
     */
    protected $id;
    /**
     * @var string $table references project table
     */
    protected $table = 'project';

    protected $construct_mode = 'PO';
    protected $data;

    private $title;
    private $description;

    /**
     * @var int $priority Range from 0 to 9
     */
    private $priority;
    /**
     * @var int $state State range from 0 to 3
     */
    private $state_num;
    /**
     * @var string $state String representation of state
     */
    private $state_name;

    private $date_created;
    private $date_deadline;

    private $value_num;
    private $value_num_max;

    private $measurement_name;

    /**
     * @var int $isClosed  0 if false, 1 if true *default is 0
     */
    private $isClosed;
    /**
     * @var int $isArchive  0 if false, 1 if true *default is 0
     */
    private $isArchive;
    /**
     * @var int $isSmart  0 if false, 1 if true *default is 0
     */
    private $isSmart;

    /**
     * @var int $fkcompany ManyToOne, references table company by id
     */
    private $fkcompany_id;

    /**
     * @var int $fkuser ManyToOne, references table user by id
     */
    private $fkuser_id;

    /**
     * Project constructor
     * @param string $construct_mode Use 'PO' for persistence object and 'Bo' for business object *default is set to PO
     * @param int $id Unique identification
     * @param string $title
     * @param string $description
     * @param int $priority Range from 1 to 9
     * @param int $state_num State range from 0 to 3
     * @param string $date_created, defaults to NOW()
     * @param string $date_deadline
     * @param int $value_num
     * @param int $value_num_max
     * @param int $isClosed 0 if false, 1 if true *default is 0
     * @param int $isArchive 0 if false, 1 if true *default is 0
     * @param int $isSmart 0 if false, 1 if true *default is 0
     * @param string $measurement_name
     * @param int $fkcompany_id ManyToOne, references table company by id
     * @param int $fkuser_id ManyToOne, references table user by id
     *
     */
    public function __construct(
        $construct_mode = 'PO',
        $id = 0,
        $title = '',
        $description = '',
        $priority = 0,
        $state_num = 0,
        $date_created = null,
        $date_deadline = null,
        $value_num = 0,
        $value_num_max = 0,
        $measurement_name = '',
        $isClosed = 0,
        $isArchive = 0,
        $isSmart = 0,
        $fkcompany_id = null,
        $fkuser_id = null)
    {

        switch($construct_mode){

            case 'BO':
                $this->construct_BO();
                break;
            case 'PO':
                $this->construct_PO(
                    $title,
                    $description,
                    $priority,
                    $state_num,
                    $date_deadline,
                    $value_num,
                    $value_num_max,
                    $measurement_name,
                    $isClosed,
                    $isArchive,
                    $isSmart,
                    $fkcompany_id,
                    $fkuser_id);
                break;
            default:
                return null;
                break;
        }

    }

    protected function construct_PO(
        $title = '',
        $description = '',
        $priority = 0,
        $state_num = 0,
        $date_deadline = null,

        $value_num = 0,
        $value_num_max = 0,
        $measurement_name = '',

        $isClosed = 0,
        $isArchive=0,
        $isSmart = 0,

        $fkcompany_id = null,
        $fkuser_id = null)
    {

        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;

        $this->state_num = $state_num;
        $this->date_deadline = $date_deadline;

        $this->value_num = $value_num;
        $this->value_num_max = $value_num_max;
        $this->measurement_name = $measurement_name;

        $this->isClosed = $isClosed;
        $this->isArchive = $isArchive;
        $this->isSmart = $isSmart;

        $this->fkcompany_id = $fkcompany_id;
        $this->fkuser_id = $fkuser_id;

    }

    protected function construct_BO(){


    }

    public function toData($table = ""){

        $this->data = array(
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'priority' => $this->getPriority(),
            'state_num' => $this->getStateNum(),
            'date_deadline' => $this->getDateDeadline(),
            'value_num' => $this->getValueNum(),
            'value_num_max' => $this->getValueNumMax(),
            'measurement_name' => $this->getMeasurementName(),
            'isClosed' => $this->getIsClosed(),
            'isArchive' => $this->getIsArchive(),
            'isSmart' => $this->getIsSmart(),
            'fkproject_company_id' => $this->getFkcompany_id(),
            'fkproject_user_id' => $this->getFkuser_id()
        );

        return $this->data;

    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTable(): string
    {
        return $this->table;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getStateNum(): int
    {
        return $this->state_num;
    }

    /**
     * @param int $state_num
     */
    public function setStateNum(int $state_num)
    {
        $this->state_num = $state_num;
    }

    /**
     * @return string
     */
    public function getStateName(): string
    {
        return $this->state_name;
    }

    /**
     * @param string $state_name
     */
    public function setStateName(string $state_name)
    {
        $this->state_name = $state_name;
    }

    /**
     * @return mixed
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * @param $date_created
     */
    public function setDateCreated($date_created)
    {
        $this->date_created = $date_created;
    }

    /**
     * @return mixed
     */
    public function getDateDeadline()
    {
        return $this->date_deadline;
    }

    /**
     * @param mixed $date_deadline
     */
    public function setDateDeadline($date_deadline)
    {
        $this->date_deadline = $date_deadline;
    }

    /**
     * @return mixed
     */
    public function getValueNum()
    {
        return $this->value_num;
    }

    /**
     * @param mixed $value_num
     */
    public function setValueNum($value_num)
    {
        $this->value_num = $value_num;
    }

    /**
     * @return mixed
     */
    public function getValueNumMax()
    {
        return $this->value_num_max;
    }

    /**
     * @param mixed $value_num_max
     */
    public function setValueNumMax($value_num_max)
    {
        $this->value_num_max = $value_num_max;
    }

    /**
     * @return string
     */
    public function getMeasurementName()
    {
        return $this->measurement_name;
    }

    /**
     * @param string $measurement_name
     */
    public function setMeasurementName($measurement_name)
    {
        $this->measurement_name = $measurement_name;
    }

    /**
     * @return int
     */
    public function getIsClosed()
    {
        return $this->isClosed;
    }

    /**
     * @param int $isClosed
     */
    public function setIsClosed($isClosed)
    {
        $this->isClosed = $isClosed;
    }

    /**
     * @return int
     */
    public function getIsArchive()
    {
        return $this->isArchive;
    }

    /**
     * @param int $isArchive
     */
    public function setIsArchive($isArchive)
    {
        $this->isArchive = $isArchive;
    }

    /**
     * @return int
     */
    public function getIsSmart()
    {
        return $this->isSmart;
    }

    /**
     * @param int $isSmart
     */
    public function setIsSmart($isSmart)
    {
        $this->isSmart = $isSmart;
    }

    /**
     * @return int
     */
    public function getFkcompany_id()
    {
        return $this->fkcompany_id;
    }

    /**
     * @param int $fkcompany_id
     */
    public function setFkcompany_id($fkcompany_id)
    {
        $this->fkcompany_id = $fkcompany_id;
    }

    /**
     * @return int
     */
    public function getFkuser_id()
    {
        return $this->fkuser_id;
    }

    /**
     * @param int $fkuser_id
     */
    public function setFkuser_id($fkuser_id)
    {
        $this->fkuser_id = $fkuser_id;
    }

}
