<?php

class MilestoneDAO implements IMilestoneDAO  {

	protected $db;


	public function __construct(CI_DB_mysql_driver $db = null){

		$this->db = $db;
	}

	public function create(Milestone $cMilestone){

		$this->db->insert($cMilestone->getTable(), $cMilestone->toData());

		//Checks if a database insert has been a success
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}

	public function update(Milestone $cMilestone){

		$this->db->where('id', $cMilestone->getId());
		$this->db->update($cMilestone->getTable(), $cMilestone->toData());

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}


	public function select(int $key)
	{

		$CI =& get_instance();
		$CI->load->library('simb.guildie.VO/package.dbms/Milestone');

		$cMilestone = new Milestone();

		$this->db->where('id', $key);
		$query = $this->db->get($cMilestone->getTable());

		if(!empty(count($query->result_array()))){

			$data = $query->result_array();

			$cMilestone = new Milestone(
				'PO',
				$data['id'],
				$data['title'],
				$data['description'],
				$data['priority'],
				$data['date_created'],
				$data['date_deadline'],
				$data['value_num'],
				$data['value_num_max'],
				$data['isClosed'],
				$data['isArchive'],
				$data['isSmart'],
				$data['fkmilestone_value_measurement_id'],
				$data['fkmilestone_company_id'],
				$data['fkmilestone_user_id']
			);

		}else{
			return null;
		}

	}

	public function selectAll(){

		//še bom naredil

	}

	function delete(int $key)
	{

		$this->db->where('id', $key);
		$this->db->delete('milestone');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}

	}


}
?>
