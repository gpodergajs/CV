<?php 
   Class Milestones_model extends CI_Model {
	
public function insert($Object){

 		$this->load->model('Db_model');
 		$conn = $this->Db_model->conn;
     	
     	$statement = $conn->prepare("INSERT INTO milestones (fkcompany_idcompany,fkuser_iduser,title,description,priority,deadline)
    	VALUES ('$Object->fkcompany_idcompany','$Object->fkuser_iduser','$Object->title','$Object->description','$Object->priority','$Object->deadline')");

		$statement->execute();
		
	 	
	 	}


	 	public function retrieve($id) {


			$this->load->model('Db_model');
 			$conn = $this->Db_model->conn;
	 		$stmt = $conn->prepare("select * from milestones where idmilestones = :id");
   		 	$stmt->bindParam(':id', $id);
    		$stmt->execute();
    		$result = $stmt->fetch(PDO::FETCH_ASSOC);

    		//echo $result['username'];
 			// vraca mi null, matic znas pomagat morebit ?

 			$this->load->model('Milestone');
			$tempMilestone = new Milestone($result['id'],$result['fkcompany_idcompany'],$result['fkuser_iduser'],$result['title'],$result['description'],$result['priority'],$result['deadline']);

 			return $tempMilestone;

	 	   //return $conn->exec($statement);

	 	}




	 	public function retrieve_att($att,$value) {

		$this->load->model('Db_model');
 			$conn = $this->Db_model->conn;
	 		$stmt = $conn->prepare("select * from projects where ".$att." = :value");
   		 	$stmt->bindParam(':value', $value);
    		$stmt->execute();
    		//$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->load->model('Milestone');
    		
			$arr = array();
   
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$this->id = $args[0];
        		$this->fkcompany_idcompany = $args[1];
      	  	    $this->fkuser_iduser = $args[2];

    		    $this->title = $args[3];
    	 	    $this->description = $args[4];
    	 	    $this->priority = $args[5];
    		    $this->deadline = $args[6];

				$tempMilestone = new Milestone($result['id'],$result['fkcompany_idcompany'],$result['fkuser_iduser'],$result['title'],$result['description'],$result['priority'],$result['deadline']);

				array_push($arr, $tempProject);

			}

 			return $arr;


	}
	

	



   }


   ?>