<?php

    interface IMilestoneDAO{

        public function create(Milestone $cMilestone);
        public function update(Milestone $cMilestone);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }
