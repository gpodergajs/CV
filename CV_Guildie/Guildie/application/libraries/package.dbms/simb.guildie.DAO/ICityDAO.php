<?php

    interface ICityDAO{

        public function create(City $cCity);
        public function update(City $cCity);

        public function select($key);
        public function selectAll();
        public function delete(int $key);


    }
