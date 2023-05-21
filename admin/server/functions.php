<?php 



function settable($conn,$table,$id,$name){
    $value='';
	$prod = "SELECT * FROM $table where id='$id'";
	
          $run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

          while ( $row = mysqli_fetch_array( $run_prod ) ) {
           $value = $row[$name];
           
		  }
	return $value;
}


function access($conn,$table,$id,$name){
    $value ='';
    $prod ="SELECT * FROM $table where name='$name'";
    $run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

    while ( $row = mysqli_fetch_array( $run_prod ) ) {
     $value = $row[$id];
     
    }
return $value;

}




function table_show($conn,$table,$id,$name){
    $value ='';
    $prod ="SELECT * FROM $table where id='$id'";
    $run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

    while ( $row = mysqli_fetch_array( $run_prod ) ) {
     $value = $row[$name];
     
    }
return $value;

}


function table_show_per($conn,$table,$id,$name){
    $value ='';
    $prod ="SELECT * FROM $table where name='$id'";
    $run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

    while ( $row = mysqli_fetch_array( $run_prod ) ) {
     $value = $row[$name];
     
    }
return $value;

}
// $prod ="SELECT * FROM menu where name='t-shirts'";
// $run_prod = mysqli_query( $conn, $prod )or die( mysqli_error( $conn ) );

// while ( $row = mysqli_fetch_array( $run_prod ) ) {
// // $value = $row["staff"];
//  echo $row["staff"];
// }

?>