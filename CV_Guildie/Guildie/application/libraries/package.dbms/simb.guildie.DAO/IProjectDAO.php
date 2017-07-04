<?php defined('BASEPATH') OR exit('No direct script access allowed');

    interface IProjectDAO{

        public function create(Project $cProject);
        public function update(Project $cProject);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);

        public function select_data_measurement(int $key);
    }