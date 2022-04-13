<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// SubCategoryLogic Class
class SubCategoryLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createSubCategory() {
        $this->DataHandler->createData();
    }

    function readSubCategory() {
        $this->DataHandler->readData();
    }

    function readsSubCategory() {
        $this->DataHandler->readsData();
    }

    function updateSubCategory() {
        $this->DataHandler->updateData();
    }

    function deleteSubCategory() {
        $this->DataHandler->deleteData();
    }
}
?>