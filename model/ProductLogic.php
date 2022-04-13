<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// ProductLogic Class
class ProductLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createProduct() {
        $this->DataHandler->createData();
    }

    function readProduct($productId) {
        $sql = "SELECT * FROM products WHERE product_id = $productId LIMIT 1";
        return $this->DataHandler->readData($sql);
    }

    function readsProduct() {
        $sql = "SELECT * FROM products";
        return $this->DataHandler->readsData($sql);
    }

    function updateProduct() {
        $this->DataHandler->updateData();
    }

    function deleteProduct($productId) {
        $sql = "DELETE FROM products WHERE product_id = $productId LIMIT 1";
        $this->DataHandler->deleteData($sql);
        header("location:index.php?controller=ProductController");
    }
}
?>