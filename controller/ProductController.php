<?php
// Requires
require_once(dirname(__FILE__)."\..\model\ProductLogic.php");
require_once(dirname(__FILE__)."\..\model\OutputData.php");

// ProductController Class
class ProductController {

    // Properties
    private $ProductLogic;
    private $OutputData;
    private $controllerName;

    // Methods
    function __construct() {
        $this->ProductLogic = new ProductLogic();
        $this->OutputData = new OutputData();
        $this->controllerName = "ProductController";
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'createForm':
                $this->collectCreateForm();
                break;
            case 'create':
                $this->collectCreateProduct();
                break;
            case 'read':
                $this->collectReadProduct();
                break;
            case 'reads':
                $this->collectReadsProduct();
                break;
            case 'updateForm':
                $this->collectUpdateForm();
                break;
            case 'update':
                $this->collectUpdateProduct();
                break;
            case 'delete':
                $this->collectDeleteProduct();
                break;
            default:
                $this->collectReadsProduct();
                break;
        }
    }

    function collectCreateForm() {
        $result = $this->ProductLogic->readsProduct();
        $form = $this->OutputData->form("create",$result);
        include('view/form.php');
    }

    function collectCreateProduct() {
        $this->ProductLogic->createProduct();
    }

    function collectReadProduct() {
        $productId = isset($_REQUEST["product_id"]) ? $_REQUEST["product_id"] : NULL;
        $result = $this->ProductLogic->readProduct($productId);
        $table = $this->OutputData->table($result,$this->controllerName);
        include('view/overview.php');
    }

    function collectReadsProduct() {
        $result = $this->ProductLogic->readsProduct();
        $table = $this->OutputData->table($result,$this->controllerName);
        include('view/overview.php');
    }

    function collectUpdateForm() {
        $productId = isset($_REQUEST["product_id"]) ? $_REQUEST["product_id"] : NULL;
        $result = $this->ProductLogic->readProduct($productId);
        $form = $this->OutputData->form("update",$result);
        include('view/form.php');
    }

    function collectUpdateProduct() {
        $this->ProductLogic->updateProduct();
    }

    function collectDeleteProduct() {
        $productId = isset($_REQUEST["product_id"]) ? $_REQUEST["product_id"] : NULL;
        $this->ProductLogic->deleteProduct($productId);
    }
}
?>