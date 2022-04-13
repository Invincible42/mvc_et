<?php
// Requires
require_once(dirname(__FILE__)."\..\model\CustomerLogic.php");

// CustomerController Class
class CustomerController {

    // Properties
    private $CustomerLogic;

    // Methods
    function __construct() {
        $this->CustomerLogic = new CustomerLogic();
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'create':
                $this->collectCreateCustomer();
                break;
            case 'read':
                $this->collectReadCustomer();
                break;
            case 'reads':
                $this->collectReadsCustomer();
                break;
            case 'update':
                $this->collectUpdateCustomer();
                break;
            case 'delete':
                $this->collectDeleteCustomer();
                break;
            default:
                $this->collectReadsCustomer();
                break;
        }
    }

    function collectCreateCustomer() {
        $this->CustomerLogic->createCustomer();
    }

    function collectReadCustomer() {
        $this->CustomerLogic->readCustomer();
    }

    function collectReadsCustomer() {
        $this->CustomerLogic->readsCustomer();
    }

    function collectUpdateCustomer() {
        $this->CustomerLogic->updateCustomer();
    }

    function collectDeleteCustomer() {
        $this->CustomerLogic->deleteCustomer();
    }
}
?>