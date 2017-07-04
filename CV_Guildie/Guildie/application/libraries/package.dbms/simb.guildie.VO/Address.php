<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once("application/libraries/package.dbms/simb.guildie.VO/VOAbstract.php");

class Address extends VOAbstract {


    protected $id;

    protected $table = 'address';
    protected $construct_mode ='PO';
    protected $data;

    //address table
    private $street;
    private $street_num;
    private $floor;
    private $type;
    private $fkcity;

    //city table
    private $name;
    private $postcode;
    private $state_name;
    private $country_name;
    private $country_ISO;

    //address_unit table
    private $unit_num;
    private $fkaddress;

    public function __construct(
        $construct_mode = 'PO',
        $id = 0,
        $street='',
        $street_num='',
        $floor='',
        $type='',
        $fkcity=0,
        $name ='',
        $postcode=0,
        $state_name='',
        $country_name='',
        $country_ISO='',
        $unit_num=0,
        $fkaddress=null){

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
        $street='',
        $street_num='',
        $floor='',
        $type='',
        $fkcity=0,
        $name ='',
        $postcode=0,
        $state_name='',
        $country_name='',
        $country_ISO='',
        $unit_num=0,
        $fkaddress=null){


        $this->street = $street;
        $this->street_num = $street_num;
        $this->floor = $floor;
        $this->type = $type;
        $this->fkcity = $fkcity;

        $this->name = $name;
        $this->postcode = $postcode;
        $this->state_name = $state_name;
        $this->country_name = $country_name;
        $this->country_ISO = $country_ISO;

        $this->unit_num = $unit_num;
        $this->fkaddress = $fkaddress;

    }



    protected function construct_BO(
        $id = 0,
        $street='',
        $street_num='',
        $floor='',
        $type='',
        $fkcity=0,
        $name ='',
        $postcode=0,
        $state_name='',
        $country_name='',
        $country_ISO='',
        $unit_num=0,
        $fkaddress=null
    ){




    }

    public function setConstruct_mode($mode){
        $this->construct_mode = $mode;
    }




    public function toData($table){

        switch($table){
            case 'address':

                $this->data = array(
                    'street' => $this->getStreet(),
                    'street_num' => $this->getStreetNum(),
                    'floor' => $this->getFloor(),
                    'type' => $this->getType(),
                    'fkaddress_city_id' => $this->getFkcity()
                );
                return $this->data;
                break;

            case 'city':

                $this->data = array(
                    'name' => $this->getName(),
                    'postcode' =>$this->getPostcode(),
                    'state_name' =>$this->getStateName(),
                    'country_name' =>$this->getCountryName(),
                    'country_ISO' =>$this->getCountryISO()
                );
                return $this->data;
                break;

            case 'address_unit':

                $this->data = array(
                    'unit_num' => $this->getUnitNum(),
                    'fkadress_unit_address_id' =>$this->getFkaddress()
                );
                return $this->data;
                break;
        }
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

    public function getStreet(){
        return $this->street;
    }

    public function setStreet($street){
        $this->street = $street;
    }

    public function getStreetNum(){
        return $this->street_num;
    }

    public function setStreetNum($street_num){
        $this->street_num = $street_num;
    }

    public function getFloor(){
        return $this->floor;
    }

    public function setFloor($floor){
        $this->floor = $floor;
    }

    public function getType(){
        return $this->type;
    }

    public function setType($type){
        $this->type = $type;
    }

    public function getFkcity() {
        return $this->fkcity;
    }

    public function setFkcity($fkcity){
        $this->fkcity = $fkcity;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }

    public function getPostcode(){
        return $this->postcode;
    }

    public function setPostcode($postcode){
        $this->postcode = $postcode;
    }

    public function getStateName(){
        return $this->state_name;
    }

    public function setStateName($state_name){
        $this->state_name = $state_name;
    }

    public function getCountryName(){
        return $this->country_name;
    }

    public function setCountryName($country_name){
        $this->country_name = $country_name;
    }

    public function getCountryISO(){
        return $this->country_ISO;
    }

    public function setCountryISO($country_ISO){
        $this->country_ISO = $country_ISO;
    }

    public function getUnitNum(){
        return $this->unit_num;
    }

    public function setUnitNum($unit_num){
        $this->unit_num = $unit_num;
    }

    public function getFkaddress(){
        return $this->fkaddress;
    }

    public function setFkaddress($fkaddress){
        $this->fkaddress = $fkaddress;
    }

}
?>
