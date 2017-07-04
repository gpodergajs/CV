<?php

    interface IUserDAO{

        public function create(User $cUser);
        public function update(User $cUser);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }