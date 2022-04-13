<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// ReservationLogic Class
class ReservationLogic {

    // Properties
    private $DataHandler;

    // Methods
    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function createReservation() {
        $this->DataHandler->createData();
    }

    function readReservation($reservationId) {
        $sql = "SELECT * FROM reservations WHERE reservation_id = $reservationId LIMIT 1";
        return $this->DataHandler->readData($sql);
    }

    function readsReservation() {
        $sql = "SELECT * FROM reservations";
        return $this->DataHandler->readsData($sql);
    }

    function updateReservation() {
        $this->DataHandler->updateData();
    }

    function deleteReservation($reservationId) {
        $sql = "DELETE FROM reservations WHERE reservation_id = $reservationId LIMIT 1";
        $this->DataHandler->deleteData($sql);
        header("location:index.php?controller=ReservationController");
    }
}
?>