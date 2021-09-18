<?php
require('config.php');
class Employee extends Dbconfig {	
    protected $hostName;
    protected $userName;
    protected $password;
	protected $dbName;
	private $empTable = 'employee';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 		
			$database = new dbConfig();            
            $this -> hostName = $database -> serverName;
            $this -> userName = $database -> userName;
            $this -> password = $database ->password;
			$this -> dbName = $database -> dbName;			
            $conn = new mysqli($this->hostName, $this->userName, $this->password, $this->dbName);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            } else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[]=$row;            
		}
		return $data;
	}
	private function getNumRows($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}   	
	public function employeeList(){
		$where = $sqlTot = $sqlRec = "";

		if( !empty($_POST['search']['value']) ) {   
			$where .=" WHERE ";
			$where .=" ( employee_name LIKE '".$_POST['search']['value']."%' ";    
			$where .=" OR employee_salary LIKE '".$_POST['search']['value']."%' ";
	
			$where .=" OR employee_age LIKE '".$_POST['search']['value']."%' )";
		}

		// getting total number records without any search
		$sql = "SELECT * FROM ".$this->empTable." ";
		$sqlTot .= $sql;
		$sqlRec .= $sql;

		//concatenate search sql if value exist
		if(isset($where) && $where != '') {
			$sqlTot .= $where;
			$sqlRec .= $where;
		}
		
		if(!empty($_POST["order"])){
			$sqlRec .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
		} else {
			$sqlRec .= 'ORDER BY id DESC ';
		}
		if($_POST["length"] != -1){
			$sqlRec .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
		}

		$queryRecords = mysqli_query($this->dbConnect, $sqlRec);
		
		$queryTot = mysqli_query($this->dbConnect, $sqlTot);
		$numRows = mysqli_num_rows($queryTot);
		
		$employeeData = array();	
		while( $employee = mysqli_fetch_assoc($queryRecords) ) {		
			$empRows = array();			
			$empRows[] = $employee['id'];
			$empRows[] = ucfirst($employee['employee_name']);
			$empRows[] = $employee['employee_age'];
			$empRows[] = $employee['employee_salary'];						
			$empRows[] = '<div class="btn-group" role="group" aria-label="Basic mixed styles example">
			<button type="button" name="update" id="'.$employee["id"].'" class="btn btn-warning btn-xs update"><i class="bi bi-pencil-square"></i> Edit</button>
			<button type="button" name="delete" id="'.$employee["id"].'" class="btn btn-danger btn-xs delete" ><i class="bi bi-trash"></i> Delete</button></div>';
			
			$employeeData[] = $empRows;
		}
		$output = array(
			"draw"				=>	intval($_POST["draw"]),
			"recordsTotal"  	=>  $numRows,
			"recordsFiltered" 	=> 	$numRows,
			"data"    			=> 	$employeeData
		);
		echo json_encode($output);
	}
	public function getEmployee(){
		if($_POST["empId"]) {
			$sqlQuery = "
				SELECT * FROM ".$this->empTable." 
				WHERE id = '".$_POST["empId"]."'";
			$result = mysqli_query($this->dbConnect, $sqlQuery);	
			$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
			echo json_encode($row);
		}
	}
	public function updateEmployee(){
		if($_POST['empId']) {	
			$updateQuery = "UPDATE ".$this->empTable." 
			SET employee_name = '".$_POST["empName"]."', employee_age = '".$_POST["empAge"]."', employee_salary = '".$_POST["empSalary"]."'
			WHERE id ='".$_POST["empId"]."'";
			$isUpdated = mysqli_query($this->dbConnect, $updateQuery);		
		}	
	}
	public function addEmployee(){
		$insertQuery = "INSERT INTO ".$this->empTable." (employee_name, employee_age, employee_salary) 
			VALUES ('".$_POST["empName"]."', '".$_POST["empAge"]."', '".$_POST["empSalary"]."')";
		$isUpdated = mysqli_query($this->dbConnect, $insertQuery);		
	}
	public function deleteEmployee(){
		if($_POST["empId"]) {
			$sqlDelete = "
				DELETE FROM ".$this->empTable."
				WHERE id = '".$_POST["empId"]."'";		
			mysqli_query($this->dbConnect, $sqlDelete);		
		}
	}
}
?>