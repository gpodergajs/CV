<?php
	
    interface IAddressDAO{

        public function create(Address $cAddress);
        public function update(Address $cAddress);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }
