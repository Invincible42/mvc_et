<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// CategoryLogic Class
class CategoryLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createCategory() {
        $this->DataHandler->createData();
    }

    function readCategory() {
        $this->DataHandler->readData();
    }

    function readsCategory() {
        $this->DataHandler->readsData();
    }

    function updateCategory() {
        $this->DataHandler->updateData();
    }

    function deleteCategory() {
        $this->DataHandler->deleteData();
    }
}
?>