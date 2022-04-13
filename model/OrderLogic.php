<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// OrderLogic Class
class OrderLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createOrder() {
        $this->DataHandler->createData();
    }

    function readOrder() {
        $this->DataHandler->readData();
    }

    function readsOrder() {
        $this->DataHandler->readsData();
    }

    function updateOrder() {
        $this->DataHandler->updateData();
    }

    function deleteOrder() {
        $this->DataHandler->deleteData();
    }
}
?>