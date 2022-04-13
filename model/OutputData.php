<?php
// Requires
require_once(dirname(__FILE__)."\DataHandler.php");

// OutputData class
class OutputData {
    public $DataHandler;

    function __construct() {
        $this->DataHandler = new DataHandler('localhost','mysql','et_oefenen','root','');
    }

    function table($result,$controllerName) {
        $html = "<table>";
        $html .= "<tr>";
        $columns = [];
        foreach ($result[0] as $key => $value) {
            $html .= "<th>" . $key . "</th>";
            $columns[] = $key;
        }
        $html .= "<th>Actions</th>";
        $html .= "</tr>";
        foreach ($result as $rows) {
            $html .= "<tr>";
            foreach ($rows as $column) {
                $html .= "<td>";
                $html .= $column;
                $html .= "</td>";
            }
            $data = "";
            for ($i=1; $i < count($columns); $i++) { 
                $data .= "&$columns[$i]=".$rows[$columns[$i]]."";
            }
            $html .= "<td><a href='?controller=$controllerName&op=read&$columns[0]=".$rows[$columns[0]]."'>Read</a> ";
            $html .= "<a href='?controller=$controllerName&op=updateForm&$columns[0]=".$rows[$columns[0]]."$data'>Change</a> ";
            $html .= "<a href='?controller=$controllerName&op=delete&$columns[0]=".$rows[$columns[0]]."'>Delete</a> </td>";
            $html .= "</tr>";
        }
        $html .= "<tr><td><a href='?controller=$controllerName&op=createForm'>Create</a> </td></tr>"; // Stuur data mee (misschien in een form met hidden veld) en lees deze uit in de createForm file. Gebruik eventueel gettype methode om de input types te zetten.
        $html .= "</table>";
        return $html;
    }
    
    function form($formType,$result) {
        $controllerName = isset($_REQUEST["controller"]) ? $_REQUEST["controller"] : NULL;
        $tableName = strtolower(str_replace("Controller","",$controllerName))."s";

        // Get column names and their respactable values
        $columns = [];
        $values = [];
        foreach ($result[0] as $key => $value) {
            $columns[] = $key;
            $values[] = $value;
        }

        // Get amount of input fields and their respectable types
        $sql = "SELECT COLUMN_NAME, DATA_TYPE
        FROM information_schema.columns
        WHERE TABLE_NAME = '$tableName'";
        $dataTypes2 = $this->DataHandler->readsData($sql);
        $dataTypes = array();
        $inputAmount = 0;
        for ($i=0; $i < count($dataTypes2); $i++) { 
            $dataTypes[] = $dataTypes2[$i]["DATA_TYPE"];
            $inputAmount ++;
        }
        
        $createForm = ($formType == "create") ? true : NULL;
        $updateForm = ($formType == "update") ? true : NULL;

        if ($createForm == true) {
            $form = "<form action='index.php?controller=<?php $controllerName ?>&op=create' method='post'>";
            for ($i=1; $i < $inputAmount; $i++) { 
                $form .= "<label for=$columns[$i] value=$columns[$i]>$columns[$i]: </label>";
                $form .= "<input type=$dataTypes[$i] name=$columns[$i]><br>";
            }
            $form .= "<button type='submit'>Create</button></form>";
        }
        if ($updateForm == true) {
            $form = "<form action='index.php?controller=<?php $controllerName ?>&op=update' method='post'>";
            $form .= "<input type=hidden value=$values[0]>";
            for ($i=1; $i < $inputAmount; $i++) { 
                $value = $columns[$i];
                $value = $result[0][$value];
                $form .= "<label for=$columns[$i] value=$columns[$i]>$columns[$i]: </label>";
                $form .= "<input type=$dataTypes[$i] name=$columns[$i] value=$value><br>";
            }
            $form .= "<button type='submit'>Update</button></form>";
        }
        return $form;
    }

}
?>