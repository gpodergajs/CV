<?php

    if ( !defined('BASEPATH')) exit('No direct script access allowed');
    require_once("application/libraries/package.dbms/simb.guildie.VO/VOAbstract.php");

	Class Event extends VOAbstract {

		protected $id;

		protected $table = 'event';
		protected $construct_mode ='PO';
		protected $data;

		private $title;
		private $description;
		private $type;
		private $host_name;
		private $date_created;
		private $date_start;
		private $date_end;

		private $fkaddress;
		private $fkcompany;
		private $fkuser;


		public function __construct($construct_mode = 'PO',
			$id = 0,
			$title='',
			$description='',
			$type='',
			$host_name='',
			$date_created=null,
			$date_start=null,
			$date_end=null,
			$fkaddress=0,
			$fkcompany=0,
			$fkuser=0){

      $this->construct_mode = $construct_mode;

			switch($construct_mode){

                case 'BO':
                    $this->construct_BO(
                        $id = 0,
                        $title='',
                        $description='',
                        $type='',
                        $host_name='',
                        $date_created=null,
                        $date_start=null,
                        $date_end=null,
                        $fkaddress=0,
                        $fkcompany=0,
                        $fkuser=0);
                    break;
                case 'PO':
                    $this->construct_PO(
                        $title='',
                        $description='',
                        $type='',
                        $host_name='',
                        $date_created=null,
                        $date_start=null,
                        $date_end=null,
                        $fkaddress=0,
                        $fkcompany=0,
                        $fkuser=0);
                    break;
                default:
                    return null;
                    break;
            }


		}

		public function construct_PO(
			$title='',
			$description='',
			$type='',
			$host_name='',
			$date_created=null,
			$date_start=null,
			$date_end=null,
			$fkaddress=0,
			$fkcompany=0,
			$fkuser=0){


			$this->title = $title;
			$this->description = $description;
			$this->type = $type;
			$this->host_name = $host_name;

			$this->date_created = $date_created;
			$this->date_start = $date_start;
			$this->date_end = $date_end;


			$this->fkaddress = $fkaddress;
			$this->fkcompany = $fkcompany;
			$this->fkuser = $fkuser;

	   }


      public function setConstruct_mode($mode){
        $this->construct_mode = $mode;
      }

        private $daysRemaining;
        private $timeOf; // vrne dni
        private $location;
        private $timeEnd;        

        protected function construct_BO(
            $id = 0,
            $title='',
            $description='',
            $type='',
            $host_name='',
            $date_created=null,
            $date_start=null,
            $date_end=null,
            $fkaddress=0,
            $fkcompany=0,
            $fkuser=0){
          //$this->$daysRemaining = calcDays();

            $this->daysRemaining = getDaysRemaining();
            $this->timeOf = getTimeOf();
            $this->location = getLocation();
            $this->timeEnd = getTimeEnd();

        }


        public function setTimeEnd($timeEnd) {
          $this->timeEnd = $timeEnd;
        }

        public function getTimeEnd() {
          $this->calculateTimeEnd();
          return $this->timeEnd;
        }

        public function calculateTimeEnd() {

            $eD = $this->getDate_end();
            $eDt = new DateTime($eD);
            $time = $eDt->format('H:i:s');
            $this->setTimeEnd($time);
        }


        public function getLocation(){
            return $this->location;
        }

        public function setLocation($address,$city){

          $loc = $city->getName().' '.$address->getStreet().' '.$address->getStreetNum();
          $this->location = $loc;
        }


        public function getDaysRemaining(){
          return $this->daysRemaining;
        }

        public function setDaysRemaining($daysRemaining){
          $this->daysRemaining = $daysRemaining;
        }

        public function getTimeOf(){
          return $this->timeOf;
        }

        public function setTimeOf($timeOf){
          $this->timeOf = $timeOf;
        }

        public function toData($table){

	  		$this->data = array(

	  		'title' => $this->getTitle(),
				'description' => $this->getDescription(),
				'type' => $this->getType(),
				'host_name' => $this->getHost_name(),
				'date_created' => $this->getDate_created(),
				'date_start' => $this->getDate_start(),
				'date_end' => $this->getDate_end(),
				'fkevent_address_id' => $this->getFkaddress(),
				'fkevent_company_id' => $this->getFkcompany(),
				'fkevent_user_id' => $this->getFkuser()

			);

				return $this->data;

        }


        public function getTable(){
          return $this->table;
        }

        public function getId(){
        	return $this->id;
        }

        public function setId($id){
        	$this->id = $id;
        }

        public function getTitle(){
        	return $this->title;
        }

        public function setTitle($title){
        	$this->title = $title;
        }

        public function getDescription(){
        	return $this->description;
        }

        public function setDescription($description){
           $this->description = $description;
        }

        public function getType(){
        	return $this->type;
        }

        public function setType($type){
        	$this->type = $type;
        }

          public function getHost_name(){
        	return $this->host_name;
        }

        public function setHost_name($host_name){
        	$this->host_name = $host_name;
        }

        public function getDate_created(){
        	return $this->date_created;
        }

        public function setDate_created($date_created){
        	$this->date_created = $date_created;
        }

        public function getDate_start(){
        	return $this->date_start;
        }

        public function setDate_start($date_start){
        	$this->date_start = $date_start;
        }

         public function getDate_end(){
        	return $this->date_end;
        }

        public function setDate_end($date_end){
        	$this->date_end = $date_end;
        }


        public function getFkuser(){
       	   return $this->fkuser;
       }

       public function setFkuser(int $fkuser){
       	   $this->fkuser = $fkuser;
       }

		public function getFkaddress(){
       	   return $this->fkaddress;
       }

       public function setFkaddress(int $fkaddress){
       	   $this->fkaddress = $fkaddress;
       }

       public function getFkcompany(){
       	   return $this->fkcompany;
       }

       public function setFkcompany(int $fkcompany){
       	   $this->fkcompany = $fkcompany;
       }



	}


?>
