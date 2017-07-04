<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventService{

    private $cEvent;

    public function __construct()
    {
        $CI =&get_instance();
        $CI->load->library("package.dbms/simb.guildie.VO/Event");
        $this->cEvent = new Event();
    }

    public function detailArray($eventArray) {
        $retEventArray = array();

        foreach ($eventArray as $event) {
            array_push($retEventArray, $this->detail($event));
        }

        return $retEventArray;

    }

    public function detail(Event $cEvent){


        $this->setCEvent($cEvent);
        $this->calculate_daysRemaining();
        $this->calculate_timeOf();
        $this->cEvent->setConstruct_mode('BO');
        /*  if(!$isError){
              $isError = $this->calculate_daysRemaining();
          }


          if(!$isError){
              return $this->getCEvent();
          }
          */
        return $this->cEvent;
    }



    private function calculate_daysRemaining(){

        $ts1 = time();
        $ts2 = strtotime($this->cEvent->getDate_start());
        $seconds_diff = $ts2 - $ts1;
        $this->cEvent->setDaysRemaining($seconds_diff / (60*60*24));

    }

    private function calculate_timeOf(){

        $ts = strtotime($this->cEvent->getDate_start());
        $this->cEvent->setTimeOf(date('H:i:s', $ts));

    }

    /**
     * @return Event
     */
    public function getCEvent()
    {
        return $this->cEvent;
    }

    /**
     * @param Event $cEvent
     */
    public function setCEvent($cEvent)
    {
        $this->cEvent = $cEvent;
    }


}
