<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class NotificationMessage extends VOAbstract {


  protected $id;

  protected $table = 'notification_message';
  protected $construct_mode ='PO';
  protected $data;

  private $title_html;
  private $message_html;
  private $link;
  private $date_created;
  private $priority;


  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $title_html='',
    $message_html='',
    $link='',
    $date_created=null,
    $priority=0){

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
      $title_html='',
      $message_html='',
      $link='',
      $date_created=null,
      $priority=0){


        $this->title_html = $title_html;
        $this->message_html = $message_html;
        $this->link = $link;
        $this->date_created = $date_created;
        $this->priority = $priority;

      }



      protected function construct_BO(){

      }

      public function toData($table){

        $this->data = array(

          'title_html' => $this->getTitleHtml(),
          'message_html' => $this->getMessageHtml(),
          'link' => $this->getLink(),
          'date_created' => $this->getDateCreated(),
          'priority' => $this->getPriority()
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

      public function getTitleHtml(){
        return $this->title_html;
      }

      public function setTitleHtml($title_html){
        $this->title_html = $title_html;
      }

      public function getMessageHtml(){
        return $this->message_html;
      }

      public function setMessageHtml($message_html){
        $this->message_html = $message_html;
      }

      public function getLink(){
        return $this->link;
      }

      public function setLink($link){
        $this->link = $link;
      }

      public function getDateCreated(){
        return $this->date_created;
      }

      public function setDateCreated($date_created){
        $this->date_created = $date_created;
      }

      public function getPriority() {
        return $this->priority;
      }

      public function setPriority($priority){
        $this->priority = $priority;
      }

    }
    ?>
