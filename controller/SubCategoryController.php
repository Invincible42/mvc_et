<?php
// Requires
require_once(dirname(__FILE__)."\..\model\SubCategoryLogic.php");

// SubCategoryController Class
class SubCategoryController {

    // Properties
    private $SubCategoryLogic;

    // Methods
    function __construct() {
        $this->SubCategoryLogic = new SubCategoryLogic();
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'create':
                $this->collectCreateSubCategory();
                break;
            case 'read':
                $this->collectReadSubCategory();
                break;
            case 'reads':
                $this->collectReadsSubCategory();
                break;
            case 'update':
                $this->collectUpdateSubCategory();
                break;
            case 'delete':
                $this->collectDeleteSubCategory();
                break;
            default:
                $this->collectReadsSubCategory();
                break;
        }
    }

    function collectCreateSubCategory() {
        $this->SubCategoryLogic->createSubCategory();
    }

    function collectReadSubCategory() {
        $this->SubCategoryLogic->readSubCategory();
    }

    function collectReadsSubCategory() {
        $this->SubCategoryLogic->readsSubCategory();
    }

    function collectUpdateSubCategory() {
        $this->SubCategoryLogic->updateSubCategory();
    }

    function collectDeleteSubCategory() {
        $this->SubCategoryLogic->deleteSubCategory();
    }
}
?>