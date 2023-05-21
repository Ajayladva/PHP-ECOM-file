  <?php
  include_once("server/userinfoget.php");
?>
  <?php 
    include_once("server/server.php");
    include_once("server/functions.php");

    $table ="userlogin";
    $menu = "menu";
    echo "<p style='font-size:0px;'>".$table."</p>";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $table;?></title>
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
  
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


<?php   

$typesusers  = settable($conn,'common_name',$types,"name");

$users = access($conn,'menu',$typesusers,$table);
    if($users == 1){
    
$y = table_show($conn,'userlogin',$ids,"view");
    if($y == 1){
        
        ?>


<!--home page -->
<div class="right-bar" id="right_menu">




<!-- card view login userinfo -->
<div class="card" style="width:45%;text-align:center;">
<h5 class="card-title">Card title</h5>
    <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">USER NAME</th>
      <th scope="col">TODAY LOGIN</th>
      <th scope="col">DATES AND TIME</th>
    </tr>
  </thead>
  <tbody>

  <?php

  


$login_info ="SELECT name, user_type,dates, COUNT(name) FROM login_info GROUP BY name  HAVING COUNT(name) > 1";
$login_res = mysqli_query($conn,$login_info);
$nums = mysqli_num_rows($login_res);
   $i =0;
   while ( $rows = mysqli_fetch_array( $login_res ) ) {
        foreach($rows as $key => $value)
        {  $$key = $value;}
        ?>
    <tr>
      <th scope="row"><?php echo $i++;?></th>
      <td><?php echo $name;?></td>
      <td><?php  echo settable($conn,'common_name',$user_type,'name'); ?></td>
      <td><?php echo $dates;?></td>
    </tr>
  
  <?php }  ?>
  </tbody>
</table>
</div>

<?php }else{
     echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW one</h1>";
} ?>
<?php }else{
    echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW two</h1>";
} ?>

</div>

<!--end home  page-->


</body>

<script src="../jquery-3.6.3.min.js"></script>
<script>
    
  $(document).ready(function(){

   $('#menu_click').click(function(){
    var x = $("#left_menu").width();
    if(x >"80"){
        $("#left_menu").css("width", "80px");
        $("#left_menu").css("font-size","0px");
        $(".material-symbols-outlined").css("font-size","30px");
        $("#right_menu").css("width","94%");
        $("#menu_click").text("arrow_circle_right");
    }
    else{
        $("#left_menu").css("width", "16%");
        $("#left_menu").css("font-size","15px");
        $(".material-symbols-outlined").css("font-size","30px");
        $("#right_menu").css("width","84%");
        $("#menu_click").text("arrow_circle_left");

    }
   });
  


    $("#set").click (function(){
        $("#pop").trigger("reset");
        $("#shows").trigger("reset");
        $("#show_box").hide();
    });



    $("#set_d").click (function(){
        $("#show_box_d").hide();
    });



    $("#add-action").click(function(){
        $("#show_box").show();
    });


    var clickedItem;
    $(".update").on('click',function(e){
        $("#show_box").show();
        $("#UPDATE_data").show();
        $("#submit").hide();
        if (e.target.id !== e.currentTarget) {
           clickedItem = e.target.id;
         //  console.log(clickedItem);
        }
        gatdata();
    });

    var deleteitem;
    $(".delete").on('click',function(e){
        $("#show_box_d").show();
        $("#show_box").hide();
        if (e.target.id !== e.currentTarget) {
           deleteitem = e.target.id;
          // console.log(deleteitem);
        }
    });

    //active check
    $('#active').on('click',function(e){
        var ac = $('#active').val();
        if(ac == "1"){
            $('#active').val(0); 
         } else {
            $('#active').val(1); 

         }
    });
    $('#edit').on('click',function(e){
        var ed = $('#edit').val();
        if(ed == "1"){
            $('#edit').val("0"); 
            
         } else {
            $('#edit').val("1"); 
           
         }
    });
    $('#remove').on('click',function(e){
        var re = $('#remove').val();
        if(re == "1"){
            $('#remove').val("0"); 
           
         } else {
            $('#remove').val("1"); 
           
         }
    });

    $('#upload').on('click',function(e){
      // e.preventDefault();
        var up = $('#upload').val();

        if(up == "1"){
            $('#upload').val("0"); 
          
         } else {
            $('#upload').val("1"); 
            
         }
    });

    $('#view').on('click',function(e){
      // e.preventDefault();
        var ve = $('#view').val();
        if(ve == "1"){
            $('#view').val("0"); 
            console.log("1");
         } else {
            $('#view').val("1"); 
            console.log("0");
         }
    });

    $('#update_access').on('click',function(e){
      // e.preventDefault();
        var upa = $('#update_access').val();

        if(upa == "1"){
            $('#update_access').val("0"); 
            console.log("1");
         } else {
            $('#update_access').val("1"); 
            console.log("0");
         }
    });
//end check
 
    $("#delete_d").on("click",function(e){
        e.preventDefault();
  
        var table =$("#table").text();

        if(deleteitem != ""){
        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:{delete:"delete",id:deleteitem,table:table},
            success:function(data){
               $("#pop").trigger("reset");
               $("#show_box").hide();
                
              $("#shows").trigger("reset");
               
            }
        });
  
}else{
    alert("ENTER DATA INPUT");

}
   
    });

    

/// insert new value table       
$("#pop").on("submit",function(e){
        e.preventDefault();
        
        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:new FormData(this),
            dataType:'json',
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
               $("#pop").trigger("reset");
               $("#show_box").hide();
               alert(data);
             window.location.reload();
            }
        })
});

///////// update function click event ////////
var table_id;
    $(".update").on('click',function(e){
        $("#show_box").show();
        $("#UPDATE_data").show();
        $("#submit").hide();
        $("#brands").show(); 
        $("#t_name").show();
        $("#common_name").show(); 
        $("#active").show();
        $('.choosedata').css('display',"none");

        if (e.target.id !== e.currentTarget) {
           table_id = e.target.id;
        }
        gatdata();
        $('#id').val(table_id);
    });
//update table value 
$("#UPDATE_data").on("click",function(e){
        e.preventDefault();
       
        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data: $("#pop").serialize(),
             success:function(data){
               $("#pop").trigger("reset");
               $("#show_box").hide();
           //  window.location.reload();
            }
        })
});



function gatdata(e){
     
        var table =$("#table").text();




        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:{get_update:"get_update",table:table,id:clickedItem},
            success:function(data){
 
                const text = data;
                const obj = JSON.parse(text, function (key, value) {
               
                   return value;
                
            });
             $("#name").val(obj.name);
             $("#password").val(obj.password);
             $("#email").val(obj.email);
             $("#username").val(obj.username);
             $("#phone").val(obj.phone);
             $("#admin_user").val(obj.admin_user);
             $("#edit").val(obj.edit);
             $("#remove").val(obj.remove);
             $("#view").val(obj.view);
             $("#upload").val(obj.upload);
             $("#update_access").val(obj.update_access);
             $("#active").val(obj.active);


            //  $("#linking").attr("src",obj.username);
            mycheck();
             
            }
        })
      
}
function mycheck(){
       var ac = $("#edit").val();
        if(ac == "1"){
        $("#edit").prop('checked', true);
         }
         var ac = $("#remove").val();
        if(ac == "1"){
        $("#remove").prop('checked', true);
         }
         var ac = $("#view").val();
        if(ac == "1"){
        $("#view").prop('checked', true);
         }
         var ac = $("#upload").val();
        if(ac == "1"){
        $("#upload").prop('checked', true);
         }
         var ac = $("#update_access").val();
        if(ac == "1"){
        $("#update_access").prop('checked', true);
         }
         var ac = $("#active").val();
        if(ac == "1"){
        $("#active").prop('checked', true);
         }
        
      
}
  });


</script>
</html>