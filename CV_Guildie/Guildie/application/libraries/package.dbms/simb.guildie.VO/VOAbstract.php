<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class VOAbstract
 *
 * Only VO type objects ought to extend this abstract class, for database (PO) and business (BO) use
 *
 */
abstract class VOAbstract{

    protected $id;
    protected $table;

    /**
     * @var array $data Use only for persistence in database
     */
    protected $data;

    /**
     * @var string $construct_mode Use 'PO' for persistence object and 'Bo' for business object *default is set to PO
     */
    protected $construct_mode = 'PO';

    abstract protected function construct_PO();
    abstract protected function construct_BO();

    /**
     * Returns data for persistence in database
     * @return array
     */
    abstract public function toData($table);

}