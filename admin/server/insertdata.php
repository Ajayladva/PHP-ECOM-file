<?php 

include_once("server.php");
include_once("functions.php");
///////////// insert data into new database ////////


if(isset($_POST['name_title'])){
    
  $name = $_POST['name_title'];
  $title = $_POST['name_title'];
  $uploadOk = 1;
  $location = $_FILES['name_file']['name'];

  $image = "E:/new xampp/htdocs/T-shirtweb/admin/";
  $target_file = $image . $title;
  $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
  $rename = $title.'.'.$imageFileType;
  $filename = $_FILES["name_file"]["tmp_name"];
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
else{
move_uploaded_file($filename,$image.$rename);
}
}

if(isset($_POST['insertupdate'])) {

  $body="" ;
  $ucol ="";
  $ivalue="" ;
  foreach ($_POST as $key => $value) {
  
    if("insertupdate" ==$key||"id"==$key||"table" == $key){

  }else{
    $body .= $key .", ";
    $ivalue .= "'".$value."', ";
    $ucol .= $key."='".$value."', ";
  }
  }

   
///////////// insert data into database ////////

  if(isset($_POST['table']) && $_POST['table'] == 'pageauto'&& $_POST['id']=='' ){
    
    $table = $_POST['table'];
   
   

      $body = substr($body, 0, -2);
      $ivalue = substr($ivalue, 0, -2);

    if (!is_dir($image)) {
     mkdir($image);
    }

    $sql = "INSERT INTO $table ($body) VALUES ($ivalue)";
    if(mysqli_query($conn,$sql)){

      echo 1;
 }else{
  echo("Error description: " . mysqli_error($con));
 }
 
  }



  ///////////// UPDATE data into  database ////////


    if(isset($_POST['id']) && $_POST['id']!='' ){

      $id = $_POST['id'];
      $table = $_POST['table'];
      $active =$_POST['active'];
      

      $ucol = substr($ucol, 0, -2);

  
      $sql = "UPDATE $table SET $ucol WHERE id='$id'";
      if(mysqli_query($conn,$sql)){
         echo 1;
      }else{
          echo 0;
      }
    }


  
  }
  ///////// get data for table ///////
if(isset($_POST['get_update'])) {

  $id =$_POST["id"];
  $table =$_POST["table"];
  $sql = "SELECT * FROM $table WHERE id='$id'";
 
  $result = mysqli_query($conn,$sql);
  $row = array();
  $row = mysqli_fetch_assoc($result); 
     
  if(mysqli_query($conn,$sql)){
   echo json_encode($row);
   
  }else{
    //  echo  $data[2];
  }
  }

  
if(isset($_POST['delete'])) {

  $id =$_POST["id"];
  $table =$_POST["table"];
  $sql =  "DELETE FROM $table WHERE id='$id'";
  if(mysqli_query($conn,$sql)){
    
     echo 1;
  }else{
      echo 0;
  }
  }





?>