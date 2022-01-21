<!DOCTYPE html>
<html lang="en">
<head>
  <title>User</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<?php include "db.php"?>
<div class="container-fluid p-5 bg-primary text-white text-center">
  <h1>User WebPage</h1>
  <p>Enter your name and the languages you want</p> 
</div>
  
<div class="container mt-5">
  <div class="row">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
    <form action="bonjour.php" method="POST">
  <div class="mb-3 mt-3">
    <label for="fname" class="form-label">First Name :</label>
    <input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname">
  </div>
  <div class="mb-3">
    <label for="pwd" class="form-label">Language :</label>
    <select name="language" class="form-select" aria-label="Default select example">
    <option selected>Open this select menu</option>
    <?php $availablelang=mysqli_query($con,"SELECT languages FROM hello");
    while($arr1=mysqli_fetch_assoc($availablelang)){
    foreach($arr1 as $ar){
    ?>
     <option  name="language" value=<?php echo "$ar"?>><?php echo $ar?></option>
     <?php } }?>

</select>
</div>

  <input type="submit" name="usersubmit" class="btn btn-primary">
</form>

    </div>
    <div class="col-sm-4">

    </div>
  </div>
</div>

</body>
</html>
