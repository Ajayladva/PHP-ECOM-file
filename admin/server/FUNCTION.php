<?php 

include_once("server.php");
include_once("functions.php");
///////////// insert data into new database ////////


    $body="" ;
    $ucol ="";
    $ivalue="" ;
    foreach ($_POST as $key => $value) {
    
      if("insertupdate" ==$key||"id"==$key||"table1" == $key||"table" == $key){

    }else{
      $body .= $key .", ";
      $ivalue .= "'".$value."', ";
      $ucol .= $key."='".$value."', ";
    }
    }


if(isset($_POST['insertupdate'])){

  ///////////// insert into  data into  brands and common_name ////////


  if(isset($_POST['table']) && $_POST['table']=='brands'|| $_POST['table']=='common_name' && $_POST['id']=='' && $_POST['typee']!=''){

    $table = $_POST['table'];
    
    $body = substr($body, 0, -2);
    $ivalue = substr($ivalue, 0, -2);
  
    $sql = "INSERT INTO $table ($body) VALUES ($ivalue)";
    if(mysqli_query($conn,$sql)){
        
      echo 1;
   }else{
       echo 0;
   }
    
  }

  ///////////// UPDATE data into  brands and common_name ////////


  if(isset($_POST['table']) && $_POST['table']=='brands'|| $_POST['table']=='common_name' && $_POST['id']!='' && $_POST['typee']!=''){

    $id = $_POST['id'];
    $table = $_POST['table'];
    $active =$_POST['active'];
    $name = $_POST['name'];
    $typee =$_POST['typee'];
    if($active == ""){
       $active =0;
    }

    if(mysqli_query($conn,"UPDATE $table SET name='$name',typee='$typee',active='$active' WHERE id='$id'")) {
    
      echo 1;
    }else{
      echo 0;
    }
    
  }

  //    ///////////// UPLOAD IMAGE  into  database ////////


     if(isset($_POST['table1']) && $_POST['table1']== "image_gallery" && $_POST['id']!=""&& $_POST['common_name']=="ENTER COMMON NAME"){
      $table = $_POST['table'];
      $table1 = $_POST['table1'];
      $id = $_POST['id'];
      $brands = $_POST['brands'];
      $t_name = $_POST['t_name'];

      $location = $_FILES['image']['name'];
      $image_show = "../".$table.'/'.$location;

      $image = "E:/xampp/htdocs/T-shirtweb/".$table.'/';
      $target_file = $image . $location;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    $sql = "INSERT INTO $table1 (name,t_name,image,common_name,brands) VALUES ('$id','$t_name','$image_show','$table','$brands')";
     
    if(mysqli_query($conn,$sql)){
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        echo 1;
   }else{
    echo "Sorry, file already exists.";
   }
  }


  /////////////////image_gallery update into database//////////
  if(isset($_POST['table1']) && $_POST['table1']== "image_gallery"&&$_POST['common_name']!=""){
    
    $id = $_POST['id'];
    $table1 = $_POST['table1'];
    $table = $_POST['common_name'];
    $location = $_FILES['image']['name'];
    $image_show = "../".$table.'/'.$location;

    if($location != ""){  
    $ucol .= "image"."='".$image_show."', ";
    }
      $ucol = substr($ucol, 0, -2);

      $sql = "UPDATE $table1 SET $ucol WHERE id='$id'";
    if(mysqli_query($conn,$sql)){
        echo 1;
    }else{
        echo 0;
    }
}
   
///////////// insert data into database ////////

  if(isset($_POST['id']) && $_POST['id'] == '' && $_POST['table1']!= "image_gallery"&& $_POST['table']!='userlogin'&&$_POST['table']!='menu'){
    
    $table = $_POST['table'];
    $location = $_FILES['image']['name'];
 
    $image_show = "../".$table.'/'.$location;

    $image = "E:/xampp/htdocs/T-shirtweb/".$table.'/';
    $target_file = $image . $location;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($image != ""){
      $body .= "image" .", ";
      $ivalue .= "'".$image_show."', ";
      }
      $body = substr($body, 0, -2);
      $ivalue = substr($ivalue, 0, -2);

    if (!is_dir($image)) {
     mkdir($image);
    }
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }

    $sql = "INSERT INTO $table ($body) VALUES ($ivalue)";
    if(mysqli_query($conn,$sql)){
      if ($uploadOk == 0) {
         echo "Sorry, your file was not uploaded.";
         // if everything is ok, try to upload file
        }
     else{
      move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }
      echo 1;
 }else{
     echo "Sorry, file already exists.";
 }
  }



  ///////////// UPDATE data into  database ////////


    if(isset($_POST['id']) && $_POST['id']!='' && $_POST['table1']!= "image_gallery" &&  $_POST['table']!='userlogin' && $_POST['table']!='menu' && $_POST['table']!='common_name' && $_POST['table']!='brands'){

      $id = $_POST['id'];
      $table = $_POST['table'];
      $active =$_POST['active'];
      $location = $_FILES['image']['name'];
 
      $image_show = "../".$table.'/'.$location;
  
      $image = "E:/xampp/htdocs/T-shirtweb/".$table.'/';
      $target_file = $image . $location;
      $uploadOk = 1;
      $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($image != ""){
         $ucol .= "image"."='".$image_show."', ";
      }

      if($active == ""){
         $active =0;
         $ucol .= "active"."='".$active."', ";
      }
      $ucol = substr($ucol, 0, -2);

       if (file_exists($target_file)) {
         echo "Sorry, file already exists.";
         $uploadOk = 0;
       }

      $sql = "UPDATE $table SET $ucol WHERE id='$id'";
      if(mysqli_query($conn,$sql)){
        if ($uploadOk == 0) {
          echo "Sorry, your file was not uploaded.";
          // if everything is ok, try to upload file
         }
      else{
       move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
     }
         echo 1;
      }else{
          echo 0;
      }
    }


    ///////////// UPDATE data into  userlogin ////////


    if(isset($_POST['table']) && $_POST['table']=='userlogin'  && $_POST['id']!=""){

      $id = $_POST['id'];
      $table = $_POST['table'];
      $active =$_POST['active'];
      $view =$_POST['view'];


      $cars = array( 'active','view'); 
      $price = array($active ,$view); 
          foreach ($cars as $key => $value) {
          if($price[$key] == 0){
             $price[$key]  =0;
              $ucol .= "$value"."='".$price[$key]."', ";
          }else{
              $ucol .= "$value"."='".$price[$key]."', ";
          }
           } 
      $ucol = substr($ucol, 0, -2);
      $sql = "UPDATE $table SET $ucol WHERE id='$id'";
      
      if(mysqli_query($conn,$sql)){
        
         echo 1;
      }else{
          echo 0;
      }
    }

    ///////////// insert data into userlogin ////////

    if(isset($_POST['table']) && $_POST['table']=='userlogin' && $_POST['table1']!= "image_gallery"&& $_POST['id']== ""){
   
    $table = $_POST['table'];
    

  $body = substr($body, 0, -2);
  $ivalue = substr($ivalue, 0, -2);

  $sql = "INSERT INTO $table ($body) VALUES ($ivalue)";
  if(mysqli_query($conn,$sql)){
      
    echo 1;
 }else{
     echo 0;
 }
}


    ///////////// UPDATE data into  menu ////////


    if(isset($_POST['table']) && $_POST['table']=='menu' && $_POST['id']!=""){
  
      $id = $_POST['id'];
      $table = $_POST['table'];
      $admin =$_POST['admin'];
      $dev =$_POST['dev'];
      $staff =$_POST['staff'];

      $edit = $_POST['edit'];
      $remove =$_POST['remove'];
      $update =$_POST['update_access'];
      $upload =$_POST['upload'];
      $add_set =$_POST['add_set'];
   
 
    $cars = array( 'dev','staff','admin','edit','remove','update_access','upload','add_set'); 
    $price = array( $dev,$staff,$admin,$edit,$remove,$update,$upload,$add_set); 
    foreach ($cars as $key => $value) {
      if($price[$key] == 0){
         $price[$key]  =0;
          $ucol .= "$value"."='".$price[$key]."', ";
      }else{
          $ucol .= "$value"."='".$price[$key]."', ";
      }
       } 

      $ucol = substr($ucol, 0, -2);

      $sql = "UPDATE $table SET $ucol WHERE id='$id'";
      
      if(mysqli_query($conn,$sql)){
        
         echo 1;
      }else{
          echo 0;
      }
    }

    ///////////// insert data into menu ////////

    if(isset($_POST['table']) && $_POST['table']=='menu' && $_POST['table1']!= "image_gallery"&& $_POST['id']== ""){
     
      $table = $_POST['table'];

      $body = substr($body, 0, -2);
      $ivalue = substr($ivalue, 0, -2);
  
    $sql = "INSERT INTO $table ($body) VALUES ($ivalue)";
    if(mysqli_query($conn,$sql)){
        
      echo 1;
   }else{
       echo 0;
   }
  }

}
  
  

  
  
  
  ///////////// SAERCH INTO PRODUCTS data into new database ////////

  if(isset($_POST['search']) && $_POST['search']!= ""){
    $table = $_POST['table'];
    $search = $_POST['search'];

   $output="";

  $sql = "SELECT * FROM $table WHERE id LIKE '%{$search}%' OR  name LIKE '%{$search}%' ;";
  $results = mysqli_query($conn,$sql) or die ("server not");
  
  if(mysqli_num_rows($results)>0){

    while ( $row = mysqli_fetch_array( $results ) ) {
      foreach($row as $key => $value)
    {  $$key = $value; }


$output="<tr style='border:1px solid black;''>

<td style='width:8%;height:auto;'><img  src='../image/". $image." ' style='height:100px;'></td>
<td style='width:3%;height:auto;'>".$id."</td>
<td style='width:18%;height:auto;'>".$name."</td>
<td style='width:8%;height:auto;'>".settable($conn,'brands',$brands,'name')."</td>
<td style='width:25%;height:auto;'>". $t_name."</td>
<td style='width:5%;height:auto;'>". settable($conn,'common_name',$common_name,'name')."</td>
<td style='width:5%;height:auto;'>".$price."</td>
<td style='width:2%;height:auto;'>".$active ."

</td>

</tr>";

  }
  echo  $output;
  }else{
  echo  die("Connection failed: " . mysqli_connect_error());
    //echo $table;

  }
}

////delete data insert table ////////


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


////////// get data for table ///////
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



  ///////////////////// user login part 

  if(isset($_POST['login'])) {
    if(isset($_POST['table']) &&$_POST['table'] == 'userlogin') {
   
    $table = $_POST['table'];
    $name = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM $table WHERE username='$name' and password='$password'";
   
   if(mysqli_query($conn,$sql)){
        
    echo 1;
    }else{
     echo  mysqli_error($conn);
     echo 0;
 }
  }
  }
?>