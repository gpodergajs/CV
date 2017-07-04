<?php 
   Class Company_model extends CI_Model {

 		
	public function insert($Object){
 		//$autoload['Db_model'] = array(); ?? 
 		
 		//var_dump(get_object_vars($Object));
 		$this->load->model('Db_model');
 		$conn = $this->Db_model->conn;

     	$statement = "INSERT INTO company (owner,name,name_abb,date_established,date_created,fkaddress_idaddress,fklegal_detail_idlegal_detail)
    	VALUES ('$Object->owner', '$Object->name', '$Object->name_abb', '$Object->date_established','$Object->date_created','$Object->fkaddress_idaddress','$Object->fklegal_detail_idlegal_detail')";

		$conn->exec($statement);
	 	
	 	}


	 	public function retrieve($id) {

			$this->load->model('Db_model');
 			$conn = $this->Db_model->conn;
	 		$stmt = $conn->prepare("select * from company where idproject = :id");
   		 	$stmt->bindParam(':id', $id);
    		$stmt->execute();
    		$result = $stmt->fetch(PDO::FETCH_ASSOC);

    		echo $result['att1'];

	 	    $tempCompany = new Company($result['owner'],$result['name'],$result['name_abb'],$result['date_established'],$result['date_created'],$result['fkaddress_idaddress'],$result['fklegal_detail_idlegal_detail']);
 			// vraca mi null, matic znas pomagat morebit ?

 			return $tmpObject;

	 	   //return $conn->exec($statement);

	 	}



	 		public function retrieve_att($att,$value) {

			$this->load->model('Db_model');
 			$conn = $this->Db_model->conn;
	 		$stmt = $conn->prepare("select * from company where ".$att." = :value");
   		 	$stmt->bindParam(':value', $value);
    		$stmt->execute();
    		//$result = $stmt->fetch(PDO::FETCH_ASSOC);
			$this->load->model('Company');
    		
			$arr = array();
   
			while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

				$tempCompany = new Company($result['owner'],$result['name'],$result['name_abb'],$result['date_established'],$result['date_created'],$result['fkaddress_idaddress'],$result['fklegal_detail_idlegal_detail']);

				array_push($arr, $tempCompany);

			}

 			return $arr;


	}




   }


   ?>