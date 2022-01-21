<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bonjour</title>
</head>
<body>
<?php
            include "db.php";
            if($_POST["usersubmit"]){
                if($_POST["fname"]){
                    $fname= $_POST["fname"];
                    $language= $_POST["language"];
                    $req=mysqli_query($con,"SELECT translates FROM hello WHERE languages =  '$language'");
                    $re=mysqli_fetch_assoc($req);
                    echo $re["translates"]." ".$fname;
                    
                }
            }
        ?>
</body>
</html>