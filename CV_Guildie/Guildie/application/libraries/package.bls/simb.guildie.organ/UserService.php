<?php 

    Class UserService {


        private $cUser;

        public function __construct()
        {
            $CI =&get_instance();
            $CI->load->library("package.dbms/simb.guildie.VO/User");
            $CI->load->library("package.dbms/simb.guildie.VO/Address");
            $CI->load->library("package.bls/simb.guildie.organ/AddressService");
            $CI->load->model('City_model');
            $CI->load->model("Address_model");
            $this->cUser = new User();
        }

        public function detailArray($userArray) {
            $retUserArray = array();
            foreach ($userArray as $user) {
                array_push($retUserArray, $this->detail($user));
            }

            return $retUserArray;

        }


          public function detail(User $cUser){

      
            $AddressService = new AddressService();
            $cAddress = new Address();
            
            $this->setCUser($cUser);
            $fkaddress = $this->cUser->getFkaddress();


            if($fkaddress != null ) {
                
                // construct address with details from address and city entity
                
                $cAddress = $AddressService->AddressCity($fkaddress);
                $this->cUser->setCAddress($cAddress);
            
            }
            
            $this->cUser->setConstruct_mode('BO');
            $this->cUser->setCAddress($cAddress);
            
            $daysSince = $this->calculateDaysSince($this->cUser->getDateJoined());
            $this->cUser->setUserSince(round($daysSince));

          /*  if(!$isError){
                $isError = $this->calculate_daysRemaining();
            }


            if(!$isError){
                return $this->getcUser();
            }
            */
            return $this->cUser;
        }


       /* public function analyze ($cUser) {

            $AddressService = new AddressService();
            $cAddress = new Address();

            $fkaddress = $cUser->getFkaddress();

            if($fkaddress != null ) {
                
              
            
            }


            $AddressService->analyze($fkaddress);


        }*/



        public function getCUser()
        {
            return $this->cUser;
        }

        public function setCUser($cUser)
        {
            $this->cUser = $cUser;
        }

        public function calculateDaysSince($daysSince) {

            $ts1 = time();
            $ts2 = strtotime($daysSince);
            $seconds_diff = $ts1-$ts2;
            return ($seconds_diff / (60*60*24));
        }


        public function turnOff($cUser){
            $cUser->setState(0);
            return $cUser;
        }

        public function turnOn($cUser){
            $cUser->setState(1);
            return $cUser;
        }



    }

 ?>