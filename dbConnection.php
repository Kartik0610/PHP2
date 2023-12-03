
<?php


$con = mysqli_connect("localhost","root","","CRUD");

if(mysqli_connect_errno()){
    die("Cannot Connect to Database".mysqli_connect_errno());
}

define("UPLOAD_SRC",$_SERVER['DOCUMENT_ROOT']."/crud-php-simple-master/uploads/");
  

define("FETCH_SRC","http://127.0.0.1/crud-php-simple-master/uploads/")
?>