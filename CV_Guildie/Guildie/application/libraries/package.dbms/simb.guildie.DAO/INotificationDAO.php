<?php

    interface INotificationDAO{

        public function create(Notification $cNotification);
        public function update(Notification $cNotification);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }
