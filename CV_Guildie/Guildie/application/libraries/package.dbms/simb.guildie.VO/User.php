<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once("application/libraries/package.dbms/simb.guildie.VO/VOAbstract.php");

Class User extends VOAbstract {

  protected $id;

  protected $table = 'user';
  protected $construct_mode ='PO';
  protected $data;

  private $email;

  /**
  * @var int $telephone_num - 11 number integer value max
  */

  private $telephone_num;

  private $password;
  private $username;
  private $name;
  private $surname;
  private $position;
  /**
  * @var int $state 0 disabled (default), 1 enabled
  */
  private $state;

  private $date_created;
  private $date_modified;
  private $date_joined;

  private $fkrole;
  private $fkaddress;
  private $fkcompany;


  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $email='',
    $telephone_num='',
    $password='',
    $username='',
    $name='',
    $surname='',
    $position='',
    $state=0,
    $date_created=null,
    $date_modified=null,
    $date_joined=null,
    $fkrole=0,
    $fkaddress=0,
    $fkcompany=0){

    $this->construct_mode = $construct_mode;

    switch($construct_mode){

      case 'BO':
        $this->construct_BO(
          $id = 0,
          $email='',
          $telephone_num='',
          $password='',
          $username='',
          $name='',
          $surname='',
          $position='',
          $state=0,
          $date_created=null,
          $date_modified=null,
          $date_joined=null,
          $fkrole=0,
          $fkaddress=0,
          $fkcompany=0);
        break;
      case 'PO':
        $this->construct_PO(
          $email='',
          $telephone_num='',
          $password='',
          $username='',
          $name='',
          $surname='',
          $position='',
          $state=0,
          $date_created=null,
          $date_modified=null,
          $date_joined=null,
          $fkrole=0,
          $fkaddress=0,
          $fkcompany=0);
        break;
      default:
        return null;
      break;
    }


    }


    public function construct_PO(
      $email='',
      $telephone_num='',
      $password='',
      $username='',
      $name='',
      $surname='',
      $position='',
      $state=0,
      $date_created=null,
      $date_modified=null,
      $date_joined=null,
      $fkrole=0,
      $fkaddress=0,
      $fkcompany=0){


        $this->email = $email;
        $this->telephone_num = $telephone_num;

        $this->password = $password;
        $this->username = $username;
        $this->name = $name;
        $this->surname = $surname;

        $this->position = $position;
        $this->state = $state;

        $this->date_created = $date_created;
        $this->date_modified = $date_modified;
        $this->date_joined = $date_joined;

        $this->fkrole = $fkrole;
        $this->fkaddress = $fkaddress;
        $this->fkcompany = $fkcompany;

        

      }

  



      public function setConstruct_mode($mode){
        $this->construct_mode = $mode;
      }




      private $cAddress;
      private $userSince;

      protected function construct_BO(
        $id = 0,
        $email='',
        $telephone_num='',
        $password='',
        $username='',
        $name='',
        $surname='',
        $position='',
        $state=0,
        $date_created=null,
        $date_modified=null,
        $date_joined=null,
        $fkrole=0,
        $fkaddress=0,
        $fkcompany=0){

        $this->cAddress = $this->getCAddress();
        $this->userSince = $this->getUserSince();


      }

      public function setUserSince($userSince){
        $this->userSince = $userSince;
      }

      public function getUserSince(){
        return $this->userSince;
      }

      public function setCAddress(Address $cAddress) {
        $this->cAddress = $cAddress;
       
      }

      public function getCAddress() {
        return $this->cAddress;
      }

      public function toData($table){

        $this->data = array(


          'email' => $this->getEmail(),
          'telephone_num' => $this->getTelephoneNum(),

          'password' => $this->getPassword(),
          'username' => $this->getUsername(),
          'name' => $this->getName(),
          'surname' => $this->getSurname(),

          'position' => $this->getPosition(),
          'state' => $this->getState(),

          'date_created' => $this->getDateCreated(),
          'date_modified' => $this->getDateModified(),
          'date_joined' => $this->getDateJoined(),

          'fkuser_role_id' => $this->getFkrole(),
          'fkuser_address_id' => $this->getFkaddress(),
          'fkuser_company_id' => $this->getFkcompany()

        );

        return $this->data;
      }


      public function getTable(){
        return $this->table;
      }

      public function getId() {
        return $this->id;
      }

      public function setId($id){
        $this->id = $id;
      }

      public function getEmail(){
        return $this->email;
      }

      public function setEmail($email){
        $this->email = $email;
      }

      public function getTelephoneNum(){
        return $this->telephone_num;
      }

      public function setTelephoneNum($telephone_num){
        $this->telephone_num = $telephone_num;
      }

      public function getPassword(){
        return $this->password;
      }

      public function setPassword($password){
        $this->password = $password;
      }

      public function getUsername(){
        return $this->username;
      }

      public function setUsername($username){
        $this->username = $username;
      }

      public function getName(){
        return $this->name;
      }

      public function setName($name){
        $this->name = $name;
      }

      public function getSurname(){
        return $this->surname;
      }

      public function setSurname($surname){
        $this->surname = $surname;
      }

      public function getPosition(){
        return $this->position;
      }

      public function setPosition($position){
        $this->position = $position;
      }

      public function getState(){
        return $this->state;
      }

      public function setState($state){
        $this->state = $state;
      }

      public function getDateCreated(){
        return $this->date_created;
      }

      public function setDateCreated($date_created){
        $this->date_created = $date_created;
      }

      public function getDateModified(){
        return $this->date_modified;
      }

      public function setDateModified($date_modified){
        $this->date_modified = $date_modified;
      }

      public function getDateJoined(){
        return $this->date_joined;
      }

      public function setDateJoined($date_joined){
        $this->date_joined = $date_joined;
      }

      /*** foreign keys ***/

      public function getFkrole() {
        return $this->fkrole;
      }

      public function setFkrole($fkrole){
        $this->fkrole = $fkrole;
      }

      public function getFkaddress(){
        return $this->fkaddress;
      }

      public function setFkaddress($fkaddress){
        $this->fkaddress = $fkaddress;
      }

      public function getFkcompany(){
        return $this->fkcompany;
      }

      public function setFkcompany($fkcompany){
        $this->fkcompany = $fkcompany;
      }
    }

    ?>
