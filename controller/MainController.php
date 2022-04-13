<?php
// Requires
require_once(dirname(__FILE__)."\ReservationController.php");
require_once(dirname(__FILE__)."\OrderController.php");
require_once(dirname(__FILE__)."\CustomerController.php");
require_once(dirname(__FILE__)."\ProductController.php");
require_once(dirname(__FILE__)."\CategoryController.php");
require_once(dirname(__FILE__)."\SubCategoryController.php");

// MainController Class
class MainController {

    // Properties
    private $ReservationController;
    private $OrderController;
    private $CustomerController;
    private $ProductController;
    private $CategoryController;
    private $SubCategoryController;

    // Methods
    function __construct() {
        $this->ReservationController = new ReservationController();
        $this->OrderController = new OrderController();
        $this->CustomerController = new CustomerController();
        $this->ProductController = new ProductController();
        $this->CategoryController = new CategoryController();
        $this->SubCategoryController = new SubCategoryController();
    }

    function handleRequest() {
        $controller = isset($_REQUEST['controller']) ? $_REQUEST['controller'] : NULL;
        switch ($controller) {
            case 'ReservationController':
                $this->ReservationController->handleRequest();
                break;
            case 'OrderController':
                $this->OrderController->handleRequest();
                break;
            case 'CustomerController':
                $this->CustomerController->handleRequest();
                break;
            case 'ProductController':
                $this->ProductController->handleRequest();
                break;
            case 'CategoryController':
                $this->CategoryController->handleRequest();
                break;
            case 'SubCategoryController':
                $this->SubCategoryController->handleRequest();
                break;
            default:
                $this->ReservationController->handleRequest();
                break;
        }
    }
}
?>