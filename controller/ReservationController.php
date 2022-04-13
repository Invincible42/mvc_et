<?php
// Requires
require_once(dirname(__FILE__)."\..\model\ReservationLogic.php");
require_once(dirname(__FILE__)."\..\model\OutputData.php");

// ReservationController Class
class ReservationController {

    // Properties
    private $ReservationLogic;
    private $OutputData;
    private $controllerName;
    private $tableName;

    // Methods
    function __construct() {
        $this->ReservationLogic = new ReservationLogic();
        $this->OutputData = new OutputData();
        $this->controllerName = "ReservationController";
        $this->tableName = "reservations";
    }

    function handleRequest() {
        $op = isset($_REQUEST['op']) ? $_REQUEST['op'] : NULL;
        switch ($op) {
            case 'createForm':
                $this->collectCreateForm();
                break;
            case 'create':
                $this->collectCreateReservation();
                break;
            case 'read':
                $this->collectReadReservation();
                break;
            case 'reads':
                $this->collectReadsReservation();
                break;
            case 'updateForm':
                $this->collectUpdateForm();
                break;
            case 'update':
                $this->collectUpdateReservation();
                break;
            case 'delete':
                $this->collectDeleteReservation();
                break;
            default:
                $this->collectReadsReservation();
                break;
        }
    }

    function collectCreateForm() {
        $result = $this->ReservationLogic->readsReservation();
        $form = $this->OutputData->form("create",$result);
        include('view/form.php');
    }

    function collectCreateReservation() {
        $this->ReservationLogic->createReservation();
    }

    function collectReadReservation() {
        $reservationId = isset($_REQUEST["reservation_id"]) ? $_REQUEST["reservation_id"] : NULL;
        $result = $this->ReservationLogic->readReservation($reservationId);
        $table = $this->OutputData->table($result,$this->controllerName);
        include('view/overview.php');
    }

    function collectReadsReservation() {
        $result = $this->ReservationLogic->readsReservation();
        $table = $this->OutputData->table($result,$this->controllerName);
        include('view/overview.php');
    }

    function collectUpdateForm() {
        $reservationId = isset($_REQUEST["reservation_id"]) ? $_REQUEST["reservation_id"] : NULL;
        $result = $this->ReservationLogic->readReservation($reservationId);
        $form = $this->OutputData->form("update",$result);
        include('view/form.php');
    }

    function collectUpdateReservation() {
        $this->ReservationLogic->updateReservation();
    }

    function collectDeleteReservation() {
        $reservationId = isset($_REQUEST["reservation_id"]) ? $_REQUEST["reservation_id"] : NULL;
        $this->ReservationLogic->deleteReservation($reservationId);
    }
}
?>