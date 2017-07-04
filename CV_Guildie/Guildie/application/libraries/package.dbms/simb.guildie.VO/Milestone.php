<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Milestone extends VOAbstract {

  /**
  * @var int $id Id with options PK, NN, AI
  */
  protected $id;
  /**
  * @var string $table references project table
  */
  protected $table = 'milestone';

  protected $construct_mode = 'PO';
  protected $data;

  private $title;
  private $description;

  /**
  * @var int $priority Range from 0 to 9
  */
  private $priority;

  private $date_created;
  private $date_deadline;

  private $value_num;
  private $value_num_max;

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
  * @var int $fkvalue_measurement ManyToOne, references table value_measurement by id
  */
  private $fkvalue_measurement;

  /**
  * @var int $fkcompany ManyToOne, references table company by id
  */
  private $fkcompany;

  /**
  * @var int $fkuser ManyToOne, references table user by id
  */
  private $fkuser;



  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $title = '',
    $description = '',
    $priority = 0,
    $date_created = null,
    $date_deadline = null,
    $value_num = 0,
    $value_num_max = 0,
    $isClosed = 0,
    $isArchive = 0,
    $isSmart = 0,
    $measurement_name = '',
    $fkvalue_measurement = 0,
    $fkcompany = 0,
    $fkuser = 0)
    {

      switch($construct_mode){

        case 'BO':
        $this->construct_BO();
        break;
        case 'PO':
        $this->construct_PO();
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
      $date_deadline = null,
      $value_num = 0,
      $value_num_max = 0,
      $isClosed = 0,
      $isSmart = 0,
      $measurement_name = '',
      $fkvalue_measurement = 0,
      $fkcompany = 0,
      $fkuser = 0)
      {

        $this->title = $title;
        $this->description = $description;
        $this->priority = $priority;
        $this->date_deadline = $date_deadline;
        $this->value_num = $value_num;
        $this->value_num_max = $value_num_max;
        $this->isClosed = $isClosed;
        $this->isSmart = $isSmart;

        $this->measurement_name = $measurement_name;
        $this->fkvalue_measurement = $fkvalue_measurement;
        $this->fkcompany = $fkcompany;
        $this->fkuser = $fkuser;

      }

      protected function construct_BO(){


      }

      public function toData(){

        $this->data = array(

          'title' => $this->getTitle(),
          'description' => $this->getDescription(),
          'priority' => $this->getPriority(),
          'date_created' => $this->getDateCreated(),
          'date_deadline' => $this->getDateDeadline(),
          'value_num' => $this->getValueNum(),
          'value_num_max' => $this->getValueNumMax(),
          'isClosed' => $this->getIsClosed(),
          'isArchive' => $this->getIsArchive(),
          'isSmart' => $this->getIsSmart(),
          //Measurement name??
          'fkmilestone_value_measurement_id' => $this->getFkvalueMeasurement(),
          'fkmilestone_company_id' => $this->getFkcompany(),
          'fkmilestone_user_id' => $this->getFkuser()

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

      public function getTable(){
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
      public function getFkvalueMeasurement()
      {
        return $this->fkvalue_measurement;
      }

      /**
      * @param int $fkvalue_measurement
      */
      public function setFkvalueMeasurement($fkvalue_measurement)
      {
        $this->fkvalue_measurement = $fkvalue_measurement;
      }


      /**
      * @return int
      */
      public function getFkcompany()
      {
        return $this->fkcompany;
      }

      /**
      * @param int $fkcompany
      */
      public function setFkcompany($fkcompany)
      {
        $this->fkcompany = $fkcompany;
      }

      /**
      * @return int
      */
      public function getFkuser()
      {
        return $this->fkuser;
      }

      /**
      * @param int $fkuser
      */
      public function setFkuser($fkuser)
      {
        $this->fkuser = $fkuser;
      }

    }
    ?>
