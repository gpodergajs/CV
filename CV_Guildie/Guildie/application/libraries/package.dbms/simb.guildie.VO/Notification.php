<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notification extends VOAbstract {


  protected $id;

  protected $table = 'notification';
  protected $construct_mode ='PO';
  protected $data;

  private $isEmailNotify;
  private $isNoticed;
  private $isArchived;

  private $fktype;
  private $fkcreated;
  private $fknotified;
  private $fkmessage;

  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $isEmailNotify=0,
    $isNoticed=0,
    $isArchived=0,
    $fktype=null,
    $fkcreated=null,
    $fknotified=null,
    $fkmessage=null){

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


    public function construct_PO(
      $isEmailNotify=0,
      $isNoticed=0,
      $isArchived=0,
      $fktype=null,
      $fkcreated=null,
      $fknotified=null,
      $fkmessage=null){


        $this->isEmailNotify = $isEmailNotify;
        $this->isNoticed = $isNoticed;
        $this->isArchived = $isArchived;
        $this->fktype = $fktype;
        $this->fkcreated = $fkcreated;
        $this->fknotified = $fknotified;
        $this->fkmessage = $fkmessage;

      }



      protected function construct_BO(){

      }

      public function toData($table){

        $this->data = array(

          'isEmailNotify' => $this->getIsEmailNotify(),
          'isNoticed' => $this->getIsNoticed(),
          'isArchived' => $this->getIsArchived(),
          'fknotification_type_id' => $this->getFktype(),
          'fknotification_user_id_created' => $this->getFkcreated(),
          'fknotification_user_id_notified' => $this->getFknotified(),
          'fknotification_message_id' => $this->getFkmessage()
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

      public function getIsEmailNotify(){
        return $this->isEmailNotify;
      }

      public function setIsEmailNotify($isEmailNotify){
        $this->isEmailNotify = $isEmailNotify;
      }

      public function getIsNoticed(){
        return $this->isNoticed;
      }

      public function setIsNoticed($isNoticed){
        $this->isNoticed = $isNoticed;
      }

      public function getIsArchived(){
        return $this->isArchived;
      }

      public function setIsArchived($isArchived){
        $this->isArchived = $isArchived;
      }

      public function getFktype(){
        return $this->fktype;
      }

      public function setFktype($fktype){
        $this->fktype = $fktype;
      }

      public function getFkcreated() {
        return $this->fkcreated;
      }

      public function setFkcreated($fkcreated){
        $this->fkcreated = $fkcreated;
      }

      public function getFknotified() {
        return $this->fknotified;
      }

      public function setFknotified($fknotified){
        $this->fknotified = $fknotified;
      }

      public function getFkmessage() {
        return $this->fkmessage;
      }

      public function setFkmessage($fkmessage){
        $this->fkmessage = $fkmessage;
      }

    }
    ?>
