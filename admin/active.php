<?php
  include_once("server/userinfoget.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="../ckeditor/ckeditor.js"></script>
 


</head>

<body> 
  
<?php 
   
    include_once("server/server.php");
    include_once("server/functions.php");
    $table ="login_info";
    $menu = "menu";
    echo "<p style='font-size:0px;'>".$table."</p>";
    
    ?>
 
<!-- menubar show all databse and update and remove-->
<div class="left-bar" id="left_menu">
     <div class="logo">
        <img class="logo-web" src="logo.jpg" alt="">
     </div>
     <?php

   
$sql ="SELECT * FROM  $menu";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
   
      while ($row = mysqli_fetch_assoc($result)) {

        ?>


<a class="bar" id="tv" href='<?php echo  $row['path'];?>'> 
    <span class="material-symbols-outlined"><?php echo $row["icon"];?></span>
    &emsp; <?php echo $row["name"];?></a>
    

    <?php   } ?>
 
</div>

<!--end menubar-->







<div class="right-bar" id="right_menu">


<!-- pop meassge waring -->
<div class="pop-massage" id='pop-massage' style="display:none">
  <h3 id='text1'><span id='text3'>Danger!</span>  <span id='close'class="material-symbols-outlined close">close</span></h3>
  <p id='text2'>Red often indicates a dangerous or negative situation.</p>
</div>


<!-- top bar menu end-->

<!--home page end -->











<table class="table table-bordered border-primary table table-striped" style="margin-top:80px;width:99%;background:white;color:black;border:1px solid black;">
    <thead style="border:1px solid black;">

        <th>name</th>
        <th>user_type</th>
       
        <?php 
   

        $fromDate =2023;
        for ($days = 9; $days >= 0; $days--){
          $datetime  = date('Y-m-d',strtotime($fromDate.' -'.$days.'days'));          
          $countrecord[$days] = $datetime;  
                            }
        ?>
       <th><?php echo $countrecord[0]?></th>
       <th><?php echo $countrecord[1]?></th>
       <th><?php echo $countrecord[2]?></th>
       <th><?php echo $countrecord[3]?></th>
       <th><?php echo $countrecord[4]?></th>
       <th><?php echo $countrecord[5]?></th>
       <th><?php echo $countrecord[6]?></th>
       <th><?php echo $countrecord[7]?></th>
       <th><?php echo $countrecord[8]?></th>
       <th><?php echo $countrecord[9]?></th>
    </thead>
    <tbody id='load'>

    <?php
   $login_info ="SELECT name, user_type,dates,  ,COUNT(name) FROM login_info GROUP BY name  HAVING COUNT(name) > 0";
   $login_res = mysqli_query($conn,$login_info);
   $nums = mysqli_num_rows($login_res);
      $i =0;
      while ( $rows = mysqli_fetch_array( $login_res ) ) {
           foreach($rows as $key => $value)
           {  $$key = $value;}
      $user_types = $rows["user_type"];
      $users_id =$rows["user_id"];

for ($days = 9; $days >= 0; $days--){
    $datetime = date('Y-m-d',strtotime($fromDate.' -'.$days.' days')); 
   //echo $datetime;
    $result= mysqli_query($conn,"SELECT * FROM $table where user_id='$users_id' AND user_type='$user_types' AND date(dates)='$datetime'")  or die(mysqli_error($conn));
    $countrecord[$days] = mysqli_num_rows($result);
// echo $countrecord[$days];     
}
     // while ($row = mysqli_fetch_assoc($result)) {

        


       // $user_types =$user_type;
        
        ?>

    <tr style="border:1px solid black;">
    <td style='width:18%;height:auto;'><?php echo $name;?></td>
    <td style='width:8%;height:auto;'><?php  echo settable($conn,'common_name',$user_type,'name'); ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[0]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[1]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[2]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[3]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[4]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[5]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[6]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[7]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[8]; ?></td>
    <td style='width:8%;height:auto;'><?php  echo $countrecord[8]; ?></td>
 
  </tr>
  <?php }
?>


    </tbody>
</table>
<!-- <div style='display:flex;align-items: center;text-align:center;margin-left:30%;margin-right:30%;'>
<button type="submit"  class="btn btn-light pagination-first" style='margin-left:10px;'  id="1">
                            FIRST PAGE
                              </button>
<button type="submit"  class="btn btn-light pagination-next " style='margin-left:10px;display:flex;align-items: center;' class="page-item pagination-next page-link" id="0">
                             NEXT PAGE <span class="material-symbols-outlined">skip_next</span>
                              </button>
<button type="submit"  class="btn btn-light pagination-pervious" style='margin-left:10px;display:flex;align-items: center;'class="page-item pagination-pervious page-link" id="0">
<span class="material-symbols-outlined">skip_previous</span>PERVIOUS PAGE
                              </button>

<button type="submit"  class="btn btn-light pagination-last" style='margin-left:10px;'  id="<?php echo $totalpage; ?>">
                             LAST PAGE 
                              </button>
                            </diV> -->

<!--end home  page-->
</div>

</body>

<script src="../jquery-3.6.3.min.js"></script>
<script>
        CKEDITOR.replace( 't_name' );
</script>

</html>