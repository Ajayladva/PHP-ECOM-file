<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>
<body>
    
</body>
</html>

<ul class="nav  nav-tabs" style='background:grey;padding:8px;'>
 

<?php 

include_once('server.php');

$query = mysqli_query($conn,'SELECT * FROM sql_query ORDER BY id');
$num = mysqli_num_rows($query);
while($row = mysqli_fetch_assoc($query)){
   ?>
        <!-- <button id='<?php echo $button_id;?>'><?php echo $button_id;?></button>
         -->

         <li class="nav-item">
        <button class='<?php echo $row['class_id'];?>' id='<?php echo $row['button_id'];?>'><?php echo $row['button_id'];?></button>
        
        </li>
     

<script>
    $(document).ready(function(){

        $('#<?php echo $row['button_id'] ?>').click(function(){
          $('#input-data').val("<?php echo $row['query_name'];?>");
         
        })
    });
</script>
        
        <?php }?>
        </ul>
        <textarea name="input-data" id="input-data" cols="30" rows="10" style='width:45%;height:370px;margin:20px;border:2px solid black;'></textarea>
<button id='set'>submit</button>


<script >
$(document).ready(function(){

    $("#set").click(function(){
       var x =  $('#input-data').val();
       if(x !=""){

      
        $.ajax({
      type: "POST",
      url: "install.php",
      data: {ids:x},
      dataType: "text",
      success: function(response){
        if(response == "1"){
          alert(response);
        }
      }
    });
}
    })
})
</script>