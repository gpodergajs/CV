<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class CityService{

        private $cCity;
        private $CityModel;

        public function __construct()
        {
            $CI =&get_instance();
            $CI->load->library("package.dbms/simb.guildie.VO/City");
            $CI->load->model("City_model");
            $this->cCity = new City();
            $this->CityModel = new City_model();
        }



        public function analyze($tCity) {

            $tCity = $this->CityModel->match($tCity->getName()); // checks by name if the city exists

            // empty does not work
            if($tCity->getName() != "") { // if it exists return the id of the 
                return $tCity->getId();
            }else if ($tCity->getName() == ""){
                return "false";
            }

        }



        public function getCCity()
        {
            return $this->cCity;
        }

        
        public function setCCity($cCity)
        {
            $this->cCity = $cCity;
        }


    }
