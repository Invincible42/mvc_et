<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// CustomerLogic Class
class CustomerLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createCustomer() {
        $this->DataHandler->createData();
    }

    function readCustomer() {
        $this->DataHandler->readData();
    }

    function readsCustomer() {
        $this->DataHandler->readsData();
    }

    function updateCustomer() {
        $this->DataHandler->updateData();
    }

    function deleteCustomer() {
        $this->DataHandler->deleteData();
    }
}
?>