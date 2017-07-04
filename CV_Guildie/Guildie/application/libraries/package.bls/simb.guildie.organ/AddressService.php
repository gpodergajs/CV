<?php 

    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    Class AddressService {


        private $cAddress;

        public function __construct()
        {
            $CI =&get_instance();
            $CI->load->library("package.dbms/simb.guildie.VO/Address");
            $CI->load->model('City_model');
            $CI->load->model('Address_model');
            $this->cAddress = new Address();
        }

        public function detailArray($addressArray) {
            $retAddressArray = array();
            foreach ($addressArray as $address) {
                array_push($retAddressArray, $this->detail($address));
            }

            return $retAddressArray;

        }


          public function detail(Address $cAddress){


            $this->cAddress = $cAddress;
            $this->cAddress->setConstruct_mode('BO');

            return $this->cAddress;
        }



        public function AddressCity($fkaddress) {


            $CityM = new City_model();
            $AddressM = new Address_model();
            $cAddress = new Address();

        
            $cAddress = $AddressM->retrieve($fkaddress);
            
            $city = $CityM->retrieve($cAddress->getFkcity())->toData('city');

            $this->setCAddress($cAddress);
            $this->cAddress->setConstruct_mode('BO');
            
            $cAddress->setName($city['name']);
            $cAddress->setPostcode($city['postcode']);
            $cAddress->setStateName($city['state_name']);
            $cAddress->setCountryName($city['country_name']);
            $cAddress->setCountryISO($city['country_ISO']);         

            return $this->cAddress;
        }


        public function analyze($cAddress) {

            $CityM = new City_model();
            $AddressM = new Address_model();

            $cAddress = $AddressM->retrieve($fkaddress);

            var_dump($cAddress);
            $city = $CityM->retrieve($cAddress->getFkcity());


        }


        public function getCAddress()
        {
            return $this->cAddress;
        }

        public function setCAddress($cAddress)
        {
            $this->cAddress = $cAddress;
        }




    }

 ?>