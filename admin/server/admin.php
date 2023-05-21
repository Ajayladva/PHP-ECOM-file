<?php
session_start();

include_once("server.php");
  

   if(isset($_POST['admin_login'])) {

        
    $name =$_POST["username"];
    $password =$_POST["password"];

    $sql = "SELECT * FROM userlogin WHERE username = '$name' AND password = '$password'";
    $result = mysqli_query($conn,$sql);
  
    if(mysqli_query($conn,$sql)){
      $nums = mysqli_num_rows($result);
      $username_info ="";
      $usertype_info ="";
      $userid_info ="";
     while ( $rows = mysqli_fetch_array( $result ) ) {
          foreach($rows as $key => $value)
          {  $$key = $value;}
          $username_info =$username;
          $usertype_info =$admin_user;
          $userid_info = $id;
     }
     $sql = "INSERT INTO login_info (name,user_type,user_id) VALUES ('$username_info','$usertype_info','$userid_info')";
     if(mysqli_query($conn,$sql)){
      echo "success";    
      setcookie("user", $name, time()+36000,"/");  /* expire in 1days  */
      setcookie("pass", $password, time()+36000, "/");
      $_SESSION['id']=$name; 
     }
   }
   }?>