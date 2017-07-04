<?php
	
    require_once("ICityDAO.php");


	class CityDAO implements ICityDAO{

    protected $db;

    public function __construct(CI_DB_mysqli_driver $db = null)
    {
        $this->db = $db;
    }


    public function setDB($db) {
        $this->db = $db;
    }

    public function create(City $cCity)
    {



       // var_dump($cCity);
        $this->db->insert($cCity->getTable(), $cCity->toData($cCity->getTable()));

        //var_dump($cCity);
        //Checks if a database insert has been a success
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function update(City $cCity)
    {

        $this->db->where('id', $cCity->getId());
        $this->db->update($cCity->getTable(), $cCity->toData());

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }

    public function select($key)
    {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/City');
        $cCity = new City();
      //  $cCity = new City();

        $this->db->where('id', $key);
        $query = $this->db->get($cCity->getTable());
        
        if(!empty(count($query->result_array()))){

            // $cCity = new City();
               
                foreach ($query->result_array() as $data) {
                  
                    $cCity->setId($data["id"]);
                    $cCity->setName($data['name']);
                    $cCity->setPostcode($data['postcode']);
                    $cCity->setStateName($data['state_name']);
                    $cCity->setCountryName($data['country_name']);
                    $cCity->setCountryISO($data['country_ISO']);
                    
               
                }


            return $cCity;

        }else{
            return null;
        }

    }

    public function selectAll(){

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/City');
        $cCity = new City();
        

        $query = $this->db->get($cCity->getTable());
        $tmpArr = array();

        foreach ($query->result_array() as $data) {
            
                    $cCity->setId($data["id"]);
                    $cCity->setName($data['name']);
                    $cCity->setPostcode($data['postcode']);
                    $cCity->setStateName($data['state_name']);
                    $cCity->setCountryName($data['country_name']);
                    $cCity->setCountryISO($data['country_ISO']);

                    array_push($tmpArr, $cCity);
        }

        return $tmpArr;

        //še bom naredil
        
    }

   public function delete(int $key)
    {

        $this->db->where('id', $key);
        $this->db->delete('city');

        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }

    }


   public function match($value) {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/City');
        $cCity = new City();
        
      //  $query = $this->db->select('*')->from('city')->like('name',$value)->or_like('postcode',$value)->or_like('state_name',$value)->or_like('country_name',$value)->get(); 
        
        $this->db->select('*');
        $this->db->from('city');
        $this->db->like('name',$value);
        $this->db->or_like('postcode',$value);
        $this->db->or_like('state_name',$value);

       // $result = $query->result_array();

          foreach ($this->db->get()->result_array() as $data) {
            

                    $cCity->setId($data["id"]);
                    $cCity->setName($data['name']);
                    $cCity->setPostcode($data['postcode']);
                    $cCity->setStateName($data['state_name']);
                    $cCity->setCountryName($data['country_name']);
                    $cCity->setCountryISO($data['country_ISO']);
                    //var_dump($cCity);    

        }

        return $cCity;

    }


    public function selectAllWhere($att,$value) {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/City');
        
        // limited to 50 results
        $query = $this->db->select('*')->where($att,$value)->limit(50)->get('city');

        $tmpArr = array();

        foreach ($query->result_array() as $data) {
                    
              
                    $cCity->setId($data["id"]);
                    $cCity->setName($data['name']);
                    $cCity->setPostcode($data['postcode']);
                    $cCity->setState_name($data['state_name']);
                    $cCity->setCountry_name($data['country_name']);
                    $cCity->setCountry_ISO($data['country_ISO']);
                 
                    array_push($tmpArr, $cUser);
        }

        return $tmpArr;



    }


    public function retrieveLastEntry() {

        $CI =& get_instance();
        $CI->load->library('package.dbms/simb.guildie.VO/City');
        $cCity = new City();

        $query=$this->db->select('*')->order_by('id',"desc")->limit(1)->get('city');
        
        foreach ($query->result_array() as $data) {
                

                   
                    $cCity->setId($data['id']);
                    $cCity->setName($data['name']);
                    $cCity->setPostcode($data['postcode']);
                    $cCity->setStateName($data['state_name']);
                    $cCity->setCountryName($data['country_name']);
                    $cCity->setCountryISO($data['country_ISO']);
                

        }
       // var_dump($cCity);

        return $cCity;

    }



}




?>
