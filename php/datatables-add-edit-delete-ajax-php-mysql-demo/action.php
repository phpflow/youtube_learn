<?php
include('Employee.php');
$emp = new Employee();
$action = isset($_POST['action']) && $_POST['action'] != '' ? $_POST['action'] : '';
switch ($action) {
	case "listEmployee":
		$emp->employeeList();
	  break;
	case "addEmployee":
		$emp->addEmployee();
	  break;
	case "getEmployee":
		$emp->getEmployee();
	  break;
	case "updateEmployee":
		$emp->updateEmployee();
	  break;
	case "empDelete":
		$emp->deleteEmployee();
	  break;
	default:
	  echo "Action found!";
  }
?>