<?php
// Requires
require_once(dirname(__FILE__)."\..\model\OrderLogic.php");

// OrderController Class
class OrderController {

    // Properties
    private $OrderLogic;

    // Methods
    function __construct() {
        $this->OrderLogic = new OrderLogic();
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'create':
                $this->collectCreateOrder();
                break;
            case 'read':
                $this->collectReadOrder();
                break;
            case 'reads':
                $this->collectReadsOrder();
                break;
            case 'update':
                $this->collectUpdateOrder();
                break;
            case 'delete':
                $this->collectDeleteOrder();
                break;
            default:
                $this->collectReadsOrder();
                break;
        }
    }

    function collectCreateOrder() {
        $this->OrderLogic->createOrder();
    }

    function collectReadOrder() {
        $this->OrderLogic->readOrder();
    }

    function collectReadsOrder() {
        $this->OrderLogic->readsOrder();
    }

    function collectUpdateOrder() {
        $this->OrderLogic->updateOrder();
    }

    function collectDeleteOrder() {
        $this->OrderLogic->deleteOrder();
    }
}
?>