<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends VOAbstract {


  protected $id;

  protected $table = 'city';
  protected $construct_mode ='PO';
  protected $data;

  private $name;
  private $postcode;
  private $state_name;
  private $country_name;
  private $country_ISO;


  public function __construct(
    $construct_mode = 'PO',
    $id = 0,
    $name='',
    $postcode='',
    $state_name='',
    $country_name='',
    $country_ISO=''){

      switch($construct_mode){

        case 'BO':
        $this->construct_BO(
          $id = 0,
          $name='',
          $postcode='',
          $state_name='',
          $country_name='',
          $country_ISO=''
          );
        break;
        case 'PO':
        $this->construct_PO(
          $name='',
          $postcode='',
          $state_name='',
          $country_name='',
          $country_ISO=''
          );
        break;
        default:
        return null;
        break;
      }


    }


    public function construct_PO(
      $name='',
      $postcode='',
      $state_name='',
      $country_name='',
      $country_ISO=0){


        $this->name = $name;
        $this->postcode = $postcode;
        $this->state_name = $state_name;
        $this->country_name = $country_name;
        $this->country_ISO = $country_ISO;


      }



      protected function construct_BO(){

      }

      public function toData($table){

        $this->data = array(

          'name' => $this->getName(),
          'postcode' => $this->getPostcode(),
          'state_name' => $this->getStateName(),
          'country_name' => $this->getCountryName(),
          'country_ISO' => $this->getCountryISO()

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

      public function getName() {
        return $this->name;
      }

      public function setName($name){
        $this->name = $name;
      }

      public function getPostcode() {
        return $this->postcode;
      }

      public function setPostcode($postcode){
        $this->postcode = $postcode;
      }

      public function getStateName() {
        return $this->state_name;
      }

      public function setStateName($state_name){
        $this->state_name = $state_name;
      }

      public function getCountryName() {
        return $this->country_name;
      }

      public function setCountryName($country_name){
        $this->country_name = $country_name;
      }

       public function getCountryISO() {
        return $this->country_ISO;
      }

      public function setCountryISO($country_ISO){
        $this->country_ISO = $country_ISO;
      }


    }
    ?>
