<?php
  
    require_once("application/libraries/package.dbms/simb.guildie.DAO/IEventDAO.php");

  class EventDAO implements IEventDAO{

    protected $db;

    public function __construct(CI_DB_mysqli_driver $db = null)
    {
        $this->db = $db;
    }

    public function setDB($db) {
        $this->db = $db;
    }


    public function create(Event $cEvent)
    {

        $this->db->insert($cEvent->getTable(), $cEvent->toData($cEvent->getTable()));

        //Checks if a database insert has been a success
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function update(Event $cEvent)
    {

        $this->db->where('id', $cEvent->getId());
        $this->db->update($cEvent->getTable(), $cEvent->toData($cEvent->getTable()));

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function select(int $key)
    {

        $CI =& get_instance();
        $CI->load->library('simb.guildie.VO/package.dbms/Event');

        $cEvent = new Event();

        $this->db->where('id', $key);
        $query = $this->db->get($cEvent->getTable());

        if(!empty(count($query->result_array()))){

         
                $cEvent = new Event();
               
                foreach ($query->result_array() as $data) {

                    $cEvent->setId($data["id"]);
                    $cEvent->setTitle($data['title']);
                    $cEvent->setDescription($data['description']);
                    $cEvent->setType($data['type']);
                    $cEvent->setHost_name($data['host_name']);
                    $cEvent->setDate_created($data['date_created']);
                    $cEvent->setDate_start($data['date_start']);
                    $cEvent->setDate_end($data['date_end']);
                    $cEvent->setFkaddress($data['fkevent_address_id']);
                    $cEvent->setFkcompany($data['fkevent_company_id']);
                    $cEvent->setFkuser($data['fkevent_user_id']);
               
                }


            return $cEvent;

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
        $this->db->delete('event');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }


    function match($value) {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/Event');
        $cEvent = new Event();
        
        $query = $this->db->select('*')->from('event')->like('title',$value)->or_like('description',$value)->or_like('host_name',$value)->get(); 
        
          foreach ($query->result_array() as $data) {
            

                    $cEvent = new Event();
                    $cEvent->setId($data["id"]);
                    $cEvent->setTitle($data['title']);
                    $cEvent->setDescription($data['description']);
                    $cEvent->setType($data['type']);
                    $cEvent->setHost_name($data['host_name']);
                    $cEvent->setDate_created($data['date_created']);
                    $cEvent->setDate_start($data['date_start']);
                    $cEvent->setDate_end($data['date_end']);
                    $cEvent->setFkaddress($data['fkevent_address_id']);
                    $cEvent->setFkcompany($data['fkevent_company_id']);
                    $cEvent->setFkuser($data['fkevent_user_id']);

        }

        return $cEvent;

    }



    function selectAllWhere($att,$value) {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/Event');
        
        // limited to 50 results
        $query = $this->db->select('*')->where($att,$value)->order_by("date_start","asc")->limit(50)->get('event');

        $eventArray = array();

        foreach ($query->result_array() as $data) {
                    
                    $cEvent = new Event();
                    $cEvent->setId($data["id"]);
                    $cEvent->setTitle($data['title']);
                    $cEvent->setDescription($data['description']);
                    $cEvent->setType($data['type']);
                    $cEvent->setHost_name($data['host_name']);
                    $cEvent->setDate_created($data['date_created']);
                    $cEvent->setDate_start($data['date_start']);
                    $cEvent->setDate_end($data['date_end']);
                    $cEvent->setFkaddress($data['fkevent_address_id']);
                    $cEvent->setFkcompany($data['fkevent_company_id']);
                    $cEvent->setFkuser($data['fkevent_user_id']);
                    array_push($eventArray, $cEvent);
        }

        return $eventArray;



    }


   /* public function orderBy($value){

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/Event');
       

        $this->db->from("event");
        $this->db->order_by($value,"asc");
        $query = $this->db->get();

        $tmpArr = array();
        
        foreach ($query ->result_array() as $data) {

                    $cEvent = new Event();
                    $cEvent->setId($data["id"]);
                    $cEvent->setTitle($data['title']);
                    $cEvent->setDescription($data['description']);
                    $cEvent->setType($data['type']);
                    $cEvent->setHost_name($data['host_name']);
                    $cEvent->setDate_created($data['date_created']);
                    $cEvent->setDate_start($data['date_start']);
                    $cEvent->setDate_end($data['date_end']);
                    $cEvent->setFkaddress($data['fkevent_address_id']);
                    $cEvent->setFkcompany($data['fkevent_company_id']);
                    $cEvent->setFkuser($data['fkevent_user_id']);
                    array_push($tmpArr, $cEvent);


        }


        return $tmpArr;


    }


*/


}




?>
