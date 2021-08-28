<?php
include_once("connect_db.php");

$records = array(
    "0" => array("Parvez", "PHP", "12"),
    "1" => array("Devid", "Java", "34"),
    "2" => array("Ajay", "Nodejs", "22")
);

/*if(is_array($records)){
    foreach ($records as $row) {
		$is_inserted = false;
		
        $fieldVal1 = mysqli_real_escape_string($conn, $row[0]);
        $fieldVal2 = mysqli_real_escape_string($conn, $row[1]);
        $fieldVal3 = mysqli_real_escape_string($conn, $row[2]);
        $query ="INSERT INTO programming_lang (emp_name, language, age) VALUES ( '". $fieldVal1."','".$fieldVal2."','".$fieldVal3."' )";
        if(mysqli_query($conn, $query))
			 $is_inserted = true;
    }
	if($is_inserted) {
		echo 'Successfully! All records inserted into mysql table.';
	} else {
		echo 'Error! insert record into mysql table.';
	}
}*/


//Option 2:
if(is_array($records)){

    $DataArr = array();
    foreach($records as $row){
        $fieldVal1 = mysqli_real_escape_string($conn, $row[0]);
        $fieldVal2 = mysqli_real_escape_string($conn, $row[1]);
        $fieldVal3 = mysqli_real_escape_string($conn, $row[2]);

        $DataArr[] = "('$fieldVal1', '$fieldVal2', '$fieldVal3')";
    }

    $sql = "INSERT INTO programming_lang (emp_name, language, age) values ";
    $sql .= implode(',', $DataArr);

    if(mysqli_query($conn, $sql)) {
		echo 'Successfully! All records inserted into mysql table through single insert command.';
	}  else {
		echo 'Error! insert record into mysql table.';
	}
}
?>