<?php

require_once("application/libraries/package.dbms/simb.guildie.DAO/IAddressDAO.php");

class AddressDAO implements IAddressDAO  {

    protected $db;

    public function __construct(CI_DB_mysqli_driver $db = null){
        $this->db = $db;
    }

    public function setDb($db){
        $this->db = $db;
    }

    public function create(Address $cAddress){

        $this->db->insert($cAddress->getTable(), $cAddress->toData($cAddress->getTable()));

        //Checks if a database insert has been a success
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function update(Address $cAddress){

        $this->db->where('id', $cAddress->getId());
        $this->db->update($cAddress->getTable(), $cAddress->toData($cAddress->getTable()));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function select(int $key)
    {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/Address');

        $cAddress = new Address();

        $this->db->where('id', $key);
        $query = $this->db->get($cAddress->getTable());

        if(!empty(count($query->result_array()))){

            $data = $query->result_array();

            $cAddress = new Address();

            foreach ($query->result_array() as $data) {

                $cAddress->setId($data["id"]);
                $cAddress->setStreet($data['street']);
                $cAddress->setStreetNum($data['street_num']);
                $cAddress->setFloor($data['floor']);
                $cAddress->setType($data['type']);
                $cAddress->setFkcity($data['fkaddress_city_id']);

            }

            return $cAddress;


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
        $this->db->delete('address');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function retrieveLastEntry() {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/Address');
        $cAddress = new Address();

        $this->db->insert_id();
        $query = $this->db->get($cAddress->getTable());

        foreach ($query->result_array() as $data) {

            $cAddress->setId($data["id"]);
            $cAddress->setStreet($data['street']);
            $cAddress->setStreetNum($data['street_num']);
            $cAddress->setFloor($data['floor']);
            $cAddress->setType($data['type']);
            $cAddress->setFkcity($data['fkaddress_city_id']);

        }

        return $cAddress;

    }


}
?>
