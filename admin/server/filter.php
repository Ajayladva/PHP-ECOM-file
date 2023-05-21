<?php 
include_once("server.php");

///////////// insert data into new database ////////

if(isset($_POST['table']) && $_POST['table']== "userlogin"){
    $table = $_POST['table'];
    $search = $_POST['search'];

   $output="";

  $sql = "SELECT * FROM $table WHERE id LIKE '%{$search}%' OR  name LIKE '%{$search}%' OR  path LIKE '%{$search}%'";
  $results = mysqli_query($conn,$sql) or die ("server not");
  
  if(mysqli_num_rows($results)>0){

    while ( $row = mysqli_fetch_array( $results ) ) {
      foreach($row as $key => $value)
    {  $$key = $value; }


$output="<tr style='border:1px solid black;''>


<td style='width:3%;height:auto;'>".$id."</td>
<td style='width:18%;height:auto;'>".$name."</td>
<td style='width:8%;height:auto;'>".$path."</td>
<td style='width:25%;height:auto;'>". $icon."</td>
<td style='width:5%;height:auto;'>". $staff."</td>
<td style='width:5%;height:auto;'>".$admin."</td>
<td style='width:2%;height:auto;'>".$dev ."</td>

</td>

</tr>";

  }
  echo  $output;
  }else{
  echo  die("Connection failed: " . mysqli_connect_error());
    //echo $table;

  }
}


if(isset($_POST['table']) && $_POST['table']== "brands"){
  $table = $_POST['table'];
  $search = $_POST['search'];

 $output="";

$sql = "SELECT * FROM $table WHERE id LIKE '%{$search}%' OR  name LIKE '%{$search}%' OR  typee LIKE '%{$search}%'";
$results = mysqli_query($conn,$sql) or die ("server not");

if(mysqli_num_rows($results)>0){

  while ( $row = mysqli_fetch_array( $results ) ) {
    foreach($row as $key => $value)
  {  $$key = $value; }


$output="<tr style='border:1px solid black;''>


<td style='width:3%;height:auto;'>".$id."</td>
<td style='width:18%;height:auto;'>".$name."</td>
<td style='width:8%;height:auto;'>".$active."</td>
<td style='width:25%;height:auto;'>". $typee."</td>



</tr>";

}
echo  $output;
}else{
echo  die("Connection failed: " . mysqli_connect_error());
  //echo $table;

}
}

if(isset($_POST['table']) && $_POST['table']== "image_gallery"){
  $table = $_POST['table'];
  $search = $_POST['search'];

 $output="";

$sql = "SELECT * FROM $table WHERE id LIKE '%{$search}%' OR  name LIKE '%{$search}%' OR  t_name LIKE '%{$search}%'";
$results = mysqli_query($conn,$sql) or die ("server not");

if(mysqli_num_rows($results)>0){

  while ( $row = mysqli_fetch_array( $results ) ) {
    foreach($row as $key => $value)
  {  $$key = $value; }


$output="<tr style='border:1px solid black;>
<td></td>
<td style='width:3%;height:auto;'>".$id."</td>
<td style='width:8%;height:auto;'><img  src='". $image ."' style='height:100px;'></td>
<td style='width:18%;height:auto;'>".$name."</td>
<td style='width:25%;height:auto;'>".$t_name."</td>
<td style='width:25%;height:auto;'>".$common_name."</td>
<td style='width:25%;height:auto;'>".$brands."</td>

</tr>";

}
echo  $output;
}else{
echo  die("Connection failed: " . mysqli_connect_error());
  //echo $table;

}
}


?>