<?php
// Requires
require_once(dirname(__FILE__)."\..\model\CategoryLogic.php");

// CategoryController Class
class CategoryController {

    // Properties
    private $CategoryLogic;

    // Methods
    function __construct() {
        $this->CategoryLogic = new CategoryLogic();
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'create':
                $this->collectCreateCategory();
                break;
            case 'read':
                $this->collectReadCategory();
                break;
            case 'reads':
                $this->collectReadsCategory();
                break;
            case 'update':
                $this->collectUpdateCategory();
                break;
            case 'delete':
                $this->collectDeleteCategory();
                break;
            default:
                $this->collectReadsCategory();
                break;
        }
    }

    function collectCreateCategory() {
        $this->CategoryLogic->createCategory();
    }

    function collectReadCategory() {
        $this->CategoryLogic->readCategory();
    }

    function collectReadsCategory() {
        $this->CategoryLogic->readsCategory();
    }

    function collectUpdateCategory() {
        $this->CategoryLogic->updateCategory();
    }

    function collectDeleteCategory() {
        $this->CategoryLogic->deleteCategory();
    }
}
?>