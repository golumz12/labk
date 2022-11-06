<?php
 
	function GetDataFromCSV() {
    $first_line = 0;
    $DataFromCSV = array();
    $file = fopen("data.csv", "r");
    while (($CSVstring = fgetcsv($file, null, ";")) !== false) {
        for ($i = 0; $i < count($CSVstring); $i++) {
            $DataFromSCV[$first_line]['productname'] = $CSVstring[0];
            $DataFromSCV[$first_line]['price'] = $CSVstring[1];
            $DataFromSCV[$first_line]['quantity'] = $CSVstring[2];
            $DataFromSCV[$first_line]['percentageoftradepremium'] = $CSVstring[3];
        }
 $first_line++;
    }
    fclose($file);
    print_r (json_encode($DataFromSCV));
 }
 function AddDataToCSV() {
    $file = fopen("data.csv",  "a+");
    fwrite($file, "\n" . implode(";", $_POST));
}
if (isset($_GET['action']) && $_GET['action'] === 'getData'){
    GetDataFromCSV();

}
if (isset($_GET['action']) && $_GET['action'] === 'addData'&& $_POST){

    AddDataToCSV();

}