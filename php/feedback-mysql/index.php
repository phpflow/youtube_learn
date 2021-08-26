<?php
include_once("connect_db.php");
?>
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

    $sql = "INSERT INTO feedback (fname, lname, email, message, mobile)   VALUES ('$fname', 
            '$lname','$email','$message','$mobile')";
          
        if(mysqli_query($conn, $sql)){
            $error = false;
            $alert_msg = "Successfully! Data stored into the database.";
            
        } else{
            $alert_msg = "ERROR: Unable to update $sql. " 
                . mysqli_error($conn);
        }
        // Close connection
        mysqli_close($conn);
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