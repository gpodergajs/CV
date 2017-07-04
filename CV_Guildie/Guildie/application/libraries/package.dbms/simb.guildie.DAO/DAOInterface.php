<?php 
	
	

	interface DAOInterface {

		public function create($Object);
		public function read($attribute,$value);
		public function update($Object);
		public function delete($attribute,$value);
		

	}
	

?>