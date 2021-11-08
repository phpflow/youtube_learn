<?php
// connect to database
$db = mysqli_connect('localhost', 'root', '', 'test');

// variable declaration
$fname = "";
$lname = "";
$email    = "";
$errors   = array(); 
//print_r($_POST);die;
// submit clicked
if (isset($_POST['submit_btn'])) {
	signup();
}

// escape string
function parse_input($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

// REGISTER USER
function signup(){
	// Global variables
	global $db, $errors, $fname, $lname, $email;

	// receive all input values from the form.
	$fname    =  parse_input($_POST['fname']);
    $lname    =  parse_input($_POST['lname']);
	$email       =  parse_input($_POST['email']);
	$pass  =  parse_input($_POST['pass']);
	$c_pass  =  parse_input($_POST['c_pass']);
    $user_type = parse_input($_POST['user_type']);

	// form validation
	if (empty($fname)) { 
		array_push($errors, "first name is required"); 
	}
    if (empty($lname)) { 
		array_push($errors, "last name is required"); 
	}
	if (empty($email)) { 
		array_push($errors, "Email is required"); 
	}
	if (empty($pass)) { 
		array_push($errors, "Password is required"); 
	}
	if ($pass != $c_pass) {
		array_push($errors, "The both passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
        //encrypt the password
		$password = md5($pass);

        $query = "INSERT INTO login (first_name, last_name, email, user_type, password) 
					  VALUES('$fname', '$lname', '$email', '$user_type', '$password')";
			mysqli_query($db, $query);
        // get id of the created user
        $logged_in_user_id = mysqli_insert_id($db);

        $_SESSION['user_info'] = getUserById($logged_in_user_id);
		
        $_SESSION['msg']  = "New user successfully created!!";

		if (isset($_POST['user_type']) &&  $_POST['user_type'] == 'admin') {
			header('location: admin/dashboard.php');
		}else{
			
			header('location: login.php');				
		}
	}
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="alert alert-danger">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

// return user info based on ID
function getUserById($id){
	global $db;
	$query = "SELECT * FROM login WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

function isLoggedIn()
{
    
	if (isset($_SESSION['user_info'])) {
		return true;
	}else{
		return false;
	}
}

if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user_info']);
	header("location: login.php");
}

// login() function
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = parse_input($_POST['email']);
	$password = parse_input($_POST['password']);

	// make sure form is filled properly
	if (empty($email)) {
		array_push($errors, "email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM login WHERE email='$email' AND password='$password' LIMIT 1";
        
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user_info'] = $logged_in_user;
				header('location: admin/dashboard.php');		  
			}else{
				$_SESSION['user_info'] = $logged_in_user;

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password entered");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user_info']) && $_SESSION['user_info']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
?>