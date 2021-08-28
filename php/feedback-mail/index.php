<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Feedback Form</title>
    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
$posted_paylods = array();
if(isset($_POST['SubmitButton'])){
    // Getting all 5 values from the form data
    $fname =  $_POST['fname'];
    $lname = $_POST['lname'];
    $email =  $_POST['email'];
    $message = $_POST['message'];
    $mobile = $_POST['mobile'];

    $error = true;
    $alert_msg ="";

	$to = "parvezmca1@gmail.com";
	
	$headers = "From: phpflow.com";
	
	//mail($to, $subject, $body, $headers)
	if (mail($to, 'Feedback', $_POST['message'], $headers)) {
		$error = false;
		$alert_msg = 'Thanks for contacting us! We will be in touch with you shortly.';
	} else {
		$error = true;
		$alert_msg = "Opps! Error to send mail";
	}
}
?>

<body>
<main class="container">
  <div class="bg-light p-5 rounded mt-3">

    <div class="card">
        <?php if(isset($_POST['SubmitButton'])) { 
            $cls = $error == false ? "alert-success" : "alert-danger";
            ?>
        <div class="card-header">
                <div class="alert <?php echo $cls;?>" >
                <?php echo $alert_msg;?>
            </div>
        </div>
        <?php } ?>
        <div class="card-body">
            <h5 class="card-title">Submit Feedback</h5>
            <div>
                <?php include_once("content.php"); ?>
            </div>
        </div>
    </div>
</div>
</main>
</body>

</html>