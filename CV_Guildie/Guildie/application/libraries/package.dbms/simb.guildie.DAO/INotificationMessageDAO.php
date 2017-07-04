<?php

    interface INotificationMessageDAO{

        public function create(NotificationMessage $cNotificationMessage);
        public function update(NotificationMessage $cNotificationMessage);

        public function select(int $key);
        public function selectAll();
        public function delete(int $key);


    }
