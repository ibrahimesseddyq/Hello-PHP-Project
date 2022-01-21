<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <?php
    include "db.php";
  ?>
<div class="container-fluid p-5 bg-primary text-white text-center">
<h1>Admin Panel</h1>
  <p>You can create , read , update , delete Translations here!</p> 
</div>
  
<div class="container my-5">
  <div class="container d-flex justify-content-around">
    <a href="?q=create"><button class="btn btn-primary">Create</button></a>
    <a href="?q=update"><button class="btn btn-primary">Update</button></a>
    <a href="?q=read"><button class="btn btn-primary">Read</button></a>
    <a href="?q=delete"><button class="btn btn-primary">Delete</button></a>
  </div>
  <div class="row mt-5">
    <div class="col-sm-4">

    </div>
    <div class="col-sm-4">
        <?php
        if(@$_GET["q"]=="create"){
          $create ='
           <form action="admin.php?q=create" method="post">
          <div class="mb-3 mt-3">
            <label for="language" class="form-label">Language :</label>
            <input type="text" class="form-control" id="language" placeholder="Enter language" name="clanguage">
          </div>
          <div class="mb-3">
            <label for="translate" class="form-label">Translate :</label>
            <input type="text" class="form-control" id="translate" placeholder="Enter Translation" name="ctranslate">
          </div>
          <button type="submit" name="csubmit" class="btn btn-primary">Submit</button>
        </form>
        ';
        echo $create;
        }else if(@$_GET["q"]=="update"){
          $update ='
           <form action="admin.php?q=update" method="post">
          <div class="mb-3 mt-3">
            <label for="language" class="form-label">Language :</label>
            <input type="text" class="form-control" id="language" placeholder="Enter language" name="ulanguage">
          </div>
          <div class="mb-3">
            <label for="translate" class="form-label">Translate :</label>
            <input type="text" class="form-control" id="translate" placeholder="Enter Translation" name="utranslate">
          </div>
          <button type="submit" name="usubmit" class="btn btn-primary">Submit</button>
        </form>
        ';
        echo $update;
        }else if(@$_GET["q"]=="delete"){
          $delete ='
          <form action="admin.php?q=delete" method="post">
         <div class="mb-3 mt-3">
           <label for="language" class="form-label">Language :</label>
           <input type="text" class="form-control" id="language" placeholder="Enter language" name="dlanguage">
         </div>

         <button type="submit" name="dsubmit" class="btn btn-primary">Submit</button>
       </form>
       ';
       echo $delete;
        }else if(@$_GET['q']=="read"){
          $res = mysqli_query($con,"SELECT * FROM hello");
          $numrow = mysqli_num_rows($res);
          if($numrow < 1){
            echo "empty";
          }else{
            ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Language</th>
                  <th>Translate</th>
                </tr>
              </thead>
              <?php
            while($row = mysqli_fetch_assoc($res)){
              echo "<tr>";
              echo "<td>".$row['languages']."</td>";
              echo "<td>".$row['translates']."</td>";
              echo '</tr>';

            }
            ?>
            </table>
            <?php
          }
        }
        ?>
    </div>
    <div class="col-sm-4">

    </div>
    <div class="col-sm-12">
      <?php
          if(isset($_POST["csubmit"])){
              $language = $_POST["clanguage"];
              $translate = $_POST["ctranslate"];
              mysqli_query($con,"INSERT INTO hello(languages,translates) VALUES('$language','$translate')");
          }else if(isset($_POST["usubmit"])){
            $language = $_POST["ulanguage"];
            $translate = $_POST["utranslate"];
            mysqli_query($con,"UPDATE hello SET languages = '$language' , translates = '$translate' WHERE languages = '$language'");
          }else if(isset($_POST["dsubmit"])){
              $language = $_POST["dlanguage"];
            mysqli_query($con,"DELETE FROM hello WHERE languages='$language'");
        }
      ?>
    </div>
  </div>
</div>
</body>
</html>