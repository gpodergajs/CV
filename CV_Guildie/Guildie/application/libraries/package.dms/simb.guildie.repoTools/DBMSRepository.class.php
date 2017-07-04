<?php
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	$CI =& get_instance();
	$CI->load->library('dms/simb.guildie.dll/IIterator');

	class DBMSRepository implements IIterator {

		public $data = array();
		public $class_name = null;
		public $loop = false;
		private $index = 0;

        /**
         * DBMSRepository constructor.
         * @param array $data Array of objects
         * @param string $class_name The class name representation which will be stored
         * @param boolean $loop Choose if the array acts as a loop
         *
         */
        function __construct($data = null, $class_name = null, $loop = false)
		{
			$this->data = $data;
			$this->class_name = $class_name;
			$this->loop = $loop;
		}
		
		function __destruct()
		{			
			$data = null;
		}

        public function rewind()
        {
            $this->index = 0;
        }

        public function forward()
        {
            $this->index = count($this->data)-1;
        }

        public function setIndex($object = null, $index = null) {
			
			if(!empty($object)){
				$this->findIndex($object);
			}
			
			if(isset($index)){
				$this->index = $index;
			}
			
		}
		
		public function hasNext() {
			
			if(index < count($this->data)-1){
				return true;
			}
			return false;

		}

        public function hasPrev() {

            if(index > 0){
                return true;
            }
            return false;

        }

        public function next() {
			
			if($this->hasNext()){
				return $this->data[++$this->index];
			}if($this->loop){
                return $this->data[$this->rewind()];
            }
			return null;

		}
		
		public function prev() {
			
			if($this->hasPrev()){
				return $this->data[--$this->index];
			}if($this->loop){
			    return $this->data[$this->forward()];
            }
			return null;
		}
		
		public function findIndex($object){
			
			$i = 0;
			foreach($this->data as $object){
				
				if($object == $object && get_class($object) == $this->class_name ){
					return $i;
				}
				
				$i++;
			}
			
			return -1;
		}

        /**
         * @return array
         */
        public function getData()
        {
            return $this->data;
        }

        /**
         * @param array $data
         */
        public function setData($data)
        {
            $this->data = $data;
        }

        /**
         * @return null
         */
        public function getClassName()
        {
            return $this->class_name;
        }

        /**
         * @param null $class_name
         */
        public function setClassName($class_name)
        {
            $this->class_name = $class_name;
        }

    }

?>