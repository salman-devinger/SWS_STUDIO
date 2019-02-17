<?php
	//include connection file
	include_once('../config.php');

	header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 00:00:00 GMT");

	$connString =  mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)
  or die('cannot connect to the server');

	$params = $_REQUEST;

	$action = isset($params['action']) != '' ? $params['action'] : '';
	$swsCls = new SWS($connString);

	switch($action) {
	 case 'edit':
		$swsCls->updateRecord($params);
	 break;
	 default:
	 $swsCls->getSWS($params);
	 return;
	}

	class SWS {
	protected $conn;
	protected $data = array();
	function __construct($connString) {
		$this->conn = $connString;
	}

	public function getSWS($params) {

		$this->data = $this->getRecords($params);

		echo json_encode($this->data);
	}

	function getRecords($params) {
		//$fp = fopen('results2.json', 'w');
		//fwrite($fp, json_encode($params, JSON_PRETTY_PRINT));   //here it will print the array pretty
		//fclose($fp);
	   // getting total number records without any search
		$sql = "CALL ATT_UI_GET_EDITABLE_DATA(".$params['code'].")";
		//$sql = "CALL ATT_UI_GET_STUDENT_DETAILS()";

		$queryRecords = mysqli_query($this->conn, $sql) or die("error to fetch employees data");

		while( $row = mysqli_fetch_assoc($queryRecords) ) {
			$data[] = $row;
		}

		return $data;   // total data array
	}
	function updateRecord($params) {
		$data = array();
		$str = $params['name'];
    $parts = explode("-", $str);
    $table = $parts[0];
    $column = $parts[1];
		//$fp = fopen('results.json', 'w');
		//fwrite($fp, json_encode($column, JSON_PRETTY_PRINT));   //here it will print the array pretty
		//fclose($fp);
		$sql = "Update `".$table."` set ".$column." = '" . $params["value"] . "' WHERE SNO='".$params["pk"]."'";
		if($result = mysqli_query($this->conn, $sql)) {
			echo 'Successfully! Record updated...';
		} else {
			die("error to update '".$params["name"]."' with '".$params["value"]."'");
		}
	}
}
?>
