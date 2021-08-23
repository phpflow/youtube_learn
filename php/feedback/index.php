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
$podted_paylods = array();
if(isset($_POST['SubmitButton'])){
    $podted_paylods = $_POST;
}
?>

<body>
<main class="container">
  <div class="bg-light p-5 rounded mt-3">

    <div class="card">
        <?php if(!empty($podted_paylods)) { ?>
        <div class="card-header">
                <div class="alert alert-info">
                <?php echo "<pre>"; print_r($podted_paylods);?>
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