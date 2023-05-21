<?php

$names= "";
if(isset($_COOKIE['user'])){
    $user =$_COOKIE['user'];
    $names = $user;
 
}else{
    header("location:../admin/login.php");
}



include_once("server.php");


$prod = "SELECT * FROM userlogin where username='$names'";
$run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

          while ( $row = mysqli_fetch_array( $run_prod ) ) {
           $name = $row['name'];
           $types = $row['admin_user'];
           $ids =$row['id'];
		  }
echo $ids ."/".$types."/".$name;

          

?>
