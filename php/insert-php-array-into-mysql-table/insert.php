<?php
include_once("connect_db.php");

$records = array(
    "0" => array("Parvez", "Alam", "123"),
    "1" => array("Affan", "Alam", "344"),
    "2" => array("Ajay", "Sharma", "22")
);

if(is_array($records)){
    foreach ($records as $row) {
        $fieldVal1 = mysqli_real_escape_string($records[$row][0]);
        $fieldVal2 = mysqli_real_escape_string($records[$row][1]);
        $fieldVal3 = mysqli_real_escape_string($records[$row][2]);
        $query ="INSERT INTO programming_lang (emp_name, language, age) VALUES ( '". $fieldVal1."','".$fieldVal2."','".$fieldVal3."' )";
        mysqli_query($conn, $query);
    }
}

/*if(is_array($records)){

    $DataArr = array();
    foreach($records as $row){
        $fieldVal1 = mysql_real_escape_string($records[$row][0]);
        $fieldVal2 = mysql_real_escape_string($records[$row][1]);
        $fieldVal3 = mysql_real_escape_string($records[$row][2]);

        $DataArr[] = "('$fieldVal1', '$fieldVal2', '$fieldVal3')";
    }

    $sql = "INSERT INTO programming_lang (emp_name, language, age) values ";
    $sql .= implode(',', $DataArr);

    mysqli_query($conn, $query); 
}*/
?>