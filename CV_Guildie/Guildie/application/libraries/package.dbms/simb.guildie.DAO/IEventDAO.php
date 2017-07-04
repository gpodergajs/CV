<?php

    interface IEventDAO{

        public function create(Event $cEvent);
        public function update(Event $cEvent);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }