<?php
require_once("application/libraries/package.dbms/simb.guildie.DAO/IUserDAO.php");

class UserDAO implements IUserDAO{

	protected $db;

	public function __construct(CI_DB_mysqli_driver $db = null){
		$this->db = $db;
	}

	public function setDB($db){
		$this->db = $db;
	}

	public function create(User $cUser){

		$this->db->insert($cUser->getTable(), $cUser->toData($cUser->getTable()));
		//Checks if a database insert has been a success
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function update(User $cUser){

		$this->db->where('id', $cUser->getId());
		$this->db->update($cUser->getTable(), $cUser->toData($cUser->getTable()));

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function select(int $key){

		$CI =& get_instance();
		$CI->load->library('package.dbms/simb.guildie.VO/User');

		$cUser = new User();

		$this->db->where('id', $key);
		$query = $this->db->get($cUser->getTable());

		if(!empty(count($query->result_array()))){

			$cUser = new User();

			foreach ($query->result_array() as $data) {

				$cUser->setId($data["id"]);
				$cUser->setEmail($data['email']);
				$cUser->setTelephoneNum($data['telephone_num']);
				$cUser->setPassword($data['password']);
				$cUser->setUsername($data['username']);
				$cUser->setName($data['name']);
				$cUser->setSurname($data['surname']);
				$cUser->setPosition($data['position']);
				$cUser->setState($data['state']);
				$cUser->setDateCreated($data['date_created']);
				$cUser->setDateModified($data['date_modified']);
				$cUser->setDateJoined($data['date_joined']);
				$cUser->setFkrole($data['fkuser_role_id']);
				$cUser->setFkaddress($data['fkuser_address_id']);
				$cUser->setFkcompany($data['fkuser_company_id']);
			}
			return $cUser;

		}else{
			return null;
		}
	}

	public function selectAll(){

		$CI =& get_instance();
		$CI->load->library('package.dbms/simb.guildie.VO/User');
		$cUser = new User();

		$query = $this->db->get($cUser->getTable());
		$tmpArr = array();

		foreach ($query->result_array() as $data) {

			$cUser->setId($data["id"]);
			$cUser->setEmail($data['email']);
			$cUser->setTelephoneNum($data['telephone_num']);
			$cUser->setPassword($data['password']);
			$cUser->setUsername($data['username']);
			$cUser->setName($data['name']);
			$cUser->setSurname($data['surname']);
			$cUser->setPosition($data['position']);
			$cUser->setState($data['state']);
			$cUser->setDateCreated($data['date_created']);
			$cUser->setDateModified($data['date_modified']);
			$cUser->setDateJoined($data['date_joined']);
			$cUser->setFkrole($data['fkuser_role_id']);
			$cUser->setFkaddress($data['fkuser_address_id']);
			$cUser->setFkcompany($data['fkuser_company_id']);

			array_push($tmpArr, $cUser);
		}
		return $tmpArr;
	}

	function delete(int $key){

		$this->db->where('id', $key);
		$this->db->delete('user');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	function match($value){

		$CI =& get_instance();
		$CI->load->library('package.dbms/simb.guildie.VO/User');
		$cUser = new User();

		$query = $this->db->select('*')->from('user')->like('name',$value)->or_like('surname',$value)->or_like('username',$value)->get();

		// $result = $query->result_array();

		foreach ($query->result_array() as $data) {


			$cUser->setId($data["id"]);
			$cUser->setEmail($data['email']);
			$cUser->setTelephoneNum($data['telephone_num']);
			$cUser->setPassword($data['password']);
			$cUser->setUsername($data['username']);
			$cUser->setName($data['name']);
			$cUser->setSurname($data['surname']);
			$cUser->setPosition($data['position']);
			$cUser->setState($data['state']);
			$cUser->setDateCreated($data['date_created']);
			$cUser->setDateModified($data['date_modified']);
			$cUser->setDateJoined($data['date_joined']);
			$cUser->setFkrole($data['fkuser_role_id']);
			$cUser->setFkaddress($data['fkuser_address_id']);
			$cUser->setFkcompany($data['fkuser_company_id']);
		}
		
		return $cUser;
	}

	function selectAllWhere($att,$value){

		$CI =& get_instance();
		$CI->load->library('package.dbms/simb.guildie.VO/User');

		// limited to 50 results
		$query = $this->db->select('*')->where($att,$value)->limit(50)->get('user');

		$tmpArr = array();

		foreach ($query->result_array() as $data) {

			$cUser = new User();
			$cUser->setId($data["id"]);
			$cUser->setEmail($data['email']);
			$cUser->setTelephoneNum($data['telephone_num']);
			$cUser->setPassword($data['password']);
			$cUser->setUsername($data['username']);
			$cUser->setName($data['name']);
			$cUser->setSurname($data['surname']);
			$cUser->setPosition($data['position']);
			$cUser->setState($data['state']);
			$cUser->setDateCreated($data['date_created']);
			$cUser->setDateModified($data['date_modified']);
			$cUser->setDateJoined($data['date_joined']);
			$cUser->setFkrole($data['fkuser_role_id']);
			$cUser->setFkaddress($data['fkuser_address_id']);
			$cUser->setFkcompany($data['fkuser_company_id']);
			array_push($tmpArr, $cUser);
		}
		return $tmpArr;

	}
}
?>
