<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends VOAbstract {

  protected $id;

  protected $table = 'activity';
  protected $construct_mode = 'PO';
  protected $data;

  private $myFluent;

    /**
     * @return mixed
     */
    public function getMyFluent()
    {
        return $this->myFluent;
    }

    /**
     * @param mixed $myFluent
     * @return Activity
     */
    public function setMyFluent($myFluent)
    {
        $this->myFluent = $myFluent;
        return $this;
    }

  private $title;
  private $body;
  private $date_created;
  private $fdate_created;
  private $link;
  private $fkuser;

  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $title = '',
    $body = '',
    $date_created = null,
    $fdate_created = null,
    $link = '',
    $fkuser = null){

    $this->construct_mode = $construct_mode;

      switch($construct_mode){

        case 'BO':
          $this->construct_BO(
            $id = 0,
            $title = '',
            $body = '',
            $date_created = null,
            $fdate_created = null,
            $link = '',
            $fkuser = null);
        break;
        case 'PO':
        $this->construct_PO(
          $title = '',
          $body = '',
          $date_created = null,
          $fdate_created = null,
          $link = '',
          $fkuser = null);
        break;
        default:
          return null;
        break;
      }


    }


    public function construct_PO(
      $title = '',
      $body = '',
      $date_created = null,
      $fdate_created = null,
      $link = '',
      $fkuser = null){

        $this->title = $title;
        $this->body = $body;
        $this->date_created = $date_created;
        $this->fdate_created = $fdate_created;
        $this->link = $link;
        $this->fkuser = $fkuser;

      }

      protected function construct_BO(){

      }

      public function toData($table){

        $this->data = array(

          'title' => $this->getTitle(),
          'body' => $this->getBody(),
          'date_created' => $this->getDateCreated(),
          'fdate_created' => $this->getFDateCreated(),
          'link' => $this->getLink(),
          'fkactivity_user_id' => $this->getFkuser()
        );

        return $this->data;
      }


      public function getId() {
        return $this->id;
      }

      public function setId($id){
        $this->id = $id;
      }

      public function getTable(){
        return $this->table;
      }

      public function getTitle(){
        return $this->title;
      }

      public function setTitle($title){
        $this->title = $title;
      }

      public function getBody(){
        return $this->body;
      }

      public function setBody($body){
        $this->body = $body;
      }

      public function getDateCreated(){
        return $this->date_created;
      }

      public function setDateCreated($date_created){
        $this->date_created = $date_created;
      }

      public function getFDateCreated(){
        return $this->fdate_created;
      }

      public function setFDateCreated($fdate_created){
        $this->fdate_created = $fdate_created;
      }

      public function getLink() {
        return $this->link;
      }

      public function setLink($link){
        $this->link = $link;
      }

      public function getFkuser() {
        return $this->fkuser;
      }

      public function setFkuser($fkuser){
        $this->fkuser = $fkuser;
      }
    }
    ?>
