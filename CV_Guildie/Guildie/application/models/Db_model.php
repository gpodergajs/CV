<?php 
   Class Db_model extends CI_Model {
	
	 public $conn;



	  public function db_insert($Object){ // to dej v Db_model --> tam pol preveriš objekt in se razčeniš (isto nardiš za poizvedovanje al pa spreminjanje itd.)

         switch (get_class($Object)) {
            case 'User':

          //  var_dump(get_object_vars($Object));

            $this->load->model('User_model');
            $this->User_model->insert($Object);

            break;

            case 'Company':

            $this->load->model('Company_model');
            $this->Company_model->insert($Object);

            break;  

            case 'Event':

            $this->load->model('Events_model');
            $this->Events_model->insert($Object);
            
            break;

            case 'Milestone':

            $this->load->model('Milestones_model');
            $this->Milestones_model->insert($Object);
               
            break;

            case 'MProject':

            $this->load->model('Project_');
            $this->Project_model->insert($Object);
               
            break;

            default:
               # code...
               break;
         }


      }




          public function db_retrieve($Object,$Id){ // to dej v Db_model --> tam pol preveriš objekt in se razčeniš (isto nardiš za poizvedovanje al pa spreminjanje itd.)

         switch (get_class($Object)) {
            case 'User':

           // var_dump(get_object_vars($Object));

            $this->load->model('User_model');
            return $this->User_model->retrieve($Id);
           // echo $this->User_model->retrieve($Id);

            break;

            case 'Company':

            $this->load->model('Company_model');
            return $this->Company_model->retrieve($Id);

            break;  

            case 'Event':

            $this->load->model('Events_model');
            return $this->Events_model->retrieve($Id);
            
            break;

            case 'Milestone':

            $this->load->model('Milestones_model');
            return $this->Milestones_model->retrieve($Id);
               
            break;

            case 'MProject':

            $this->load->model('Project_');
            return $this->Project_model->retrieve($Id);
               
            break;

            default:
               # code...
               break;
         }


      }



          public function db_update($Object,$Id){ // to dej v Db_model --> tam pol preveriš objekt in se razčeniš (isto nardiš za poizvedovanje al pa spreminjanje itd.)

         switch (get_class($Object)) {
            case 'User':

           // var_dump(get_object_vars($Object));

            $this->load->model('User_model');
            $this->User_model->update($Id);
           // echo $this->User_model->retrieve($Id);

            break;

            case 'Company':

            $this->load->model('Company_model');
            $this->Company_model->update($Id);

            break;  

            case 'Event':

            $this->load->model('Events_model');
            $this->Events_model->update($Id);
            
            break;

            case 'Milestone':

            $this->load->model('Milestones_model');
            $this->Milestones_model->update($Id);
               
            break;

            case 'MProject':

            $this->load->model('Project_');
            $this->Project_model->update($Id);
               
            break;

            default:
               # code...
               break;
         }


      }








      Public function __construct() { 
         	
         $this->conn = new PDO('mysql:host=infostudent.informatika.uni-mb.si;dbname=pr2_skupina07;charset=utf8;', 'pr2_skupina07','4raXagANub7uswUHaq2D', array( PDO::ATTR_PERSISTENT => true ));

        // $this->conn = new POD('localhost;dbname=pr2_skupina07;charset=utf8;', 'pr2_skupina07','', array( PDO::ATTR_PERSISTENT => true ))

         parent::__construct(); 
      } 
		

      public function db_con(){
	 	 if($this->conn != null)
	 	 	echo "povezava vzpostavljena";


	 }


   } 
?>