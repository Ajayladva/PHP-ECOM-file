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
  <!-- pop meassge waring -->
<div class="pop-massage" id='pop-massage' style="display:none">
  <h3 id='text1'><span id='text3'>Danger!</span>  <span id='close'class="material-symbols-outlined close">close</span></h3>
  <p id='text2'>Red often indicates a dangerous or negative situation.</p>
</div>


<!-- end -->
 <div class="input-set" id="show_box" style="display:none;"> 

    <div class='set-btn'>
        
        <a class='name-page'>add item</a>
        <button type="button"  id="set" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>

    </div>
<form method="post" id="pop" name='from-model' action="" enctype="multipart/form-data">
    
    <div class="row g-3">
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder='Product Name' name="name" id="name" required>
        </div>
        <div class="col-md-6">
          <input type="text" class="form-control" placeholder='username' name='username' id='username' required>
        </div>
      
        <div class="col-md-6">  
        <input type="text" class="form-control" placeholder='email' name='email' id='email' required>
        </div>

        <div class="col-md-6 ">  
           <input type="phone" class="form-control" placeholder='phone' name='phone' id='phone' required>
        </div>
        
        <div class="col-md-6">
            <input type="password" class="form-control" placeholder='password' name='password' id='password' required>
        </div>

        <div class="col-md-6 ">  
            <select name="admin_user" id="admin_user" class="form-control " >
            <option val="">SELECT ITEM</option>
                <?php
                   $prods = "SELECT * FROM common_name where typee='user_type' ";
                    // $prod = "SELECT * FROM task where id";
                         $prods .= " ORDER BY id ASC";
                         $run_prods = mysqli_query( $conn, $prods )or die( mysqli_error( $conn ) );
                         while ( $rows = mysqli_fetch_array( $run_prods ) ) {
                 ?>
                 <option value="<?php echo  $rows[ 'id' ]; ?>">
                  <?php echo $rows['name']; ?></option>
                <?php } ?>
            </select>
        </div>

      
       

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='view' id='view'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>VIEW</label>
        </div>
        
    
        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='active' id='active'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>ACTIVE</label>
        </div>
       
     
      </div>


      <div class='set-btn'>
<input type="hidden" class="form-control"  name="id" id="id" required>
<input type="hidden" name="insertupdate" id="<?php echo $table; ?>" class="form-control" value="insertupdate" />
<input type="hidden" name="table" id="table" class="form-control" value="<?php echo $table; ?>" />
<input type="hidden" name="table1" id="table" class="form-control" value="" />

<input  type='submit' class="input-btns"  name='submit' id='submit' >
</div>
</form>

</div>  

<!-- top bar menu -->
<div class='top-bar'>
    <button class="name_b material-symbols-outlined" id='menu_click' style="font-size:30px;">arrow_circle_right</button>
    <div class='name'>HOME</div>
    <button class="add-action" id='add-action'>add</button>
    <button class="add-action" id='filter'>filter</button>
    <div class="name_profile" id='add-logout'>
        <img style='height:30px;text-align: center;margin:0px;' src='https://upload.wikimedia.org/wikipedia/commons/6/67/User_Avatar.png?20170128013930'/>
        <p style='font-size:12px;margin:0px;'><?php echo $name;?></p>
    </div>
</div>

<!-- top bar menu end-->

<!--home page end -->

<!--delete-->
<form  class="input-set"  id="show_box_d" style="display:none;">
<div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">Bootstrap</strong>
    <button type="button"  id="set_d" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div  class="mb-3">
   <img src="https://cdn-icons-png.flaticon.com/512/6861/6861362.png" style='height:50px;' alt="">
  </div>
  <div class="toast-body">
  <p>Note: Deleting a message is permanent, so please proceed with care.</p>
      </div>
  <button type="submit" class="btn btn-primary" id="delete_d">DELETE</button>

</form>

<!--end -->

<table id='shows' class="table table-bordered border-primary" style="margin-top:80px;width:95%;background:white;color:black;border:1px solid black;">
    <thead style="border:1px solid black;">
        <th>ID</th>
        <th>NAME</th>
        <th>USERNAME</th>
        <th>PHONE</th>
        <th>EMAIL</th>
        <th>PASSWORD</th>
        <th>USER_TYPE</th>
        <th>ACTIVE</th>
        <th>VIEW</th>
        <th>STATUS</th>
    </thead>
    <tbody>

    <?php

//$sql ="SELECT $table.id,$table.name,$table.username,$table.t_name,$table.phone,$table.price,$table.active,$table.email,email.name FROM $table  INNER JOIN email  ON $table.email = email.id;";
$sql ="SELECT * FROM $table";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);


     // while ($row = mysqli_fetch_assoc($result)) {
        
        while ( $row = mysqli_fetch_array( $result ) ) {
            foreach($row as $key => $value)
          {  $$key = $value; }
        ?>
    <tr style="border:1px solid black;">
    <td style='width:3%;height:auto;'><?php echo $id;?></td>
    <td style='width:18%;height:auto;'><?php echo $name;?></td>
    <td style='width:8%;height:auto;'><?php  echo $username ?></td>
    <td style='width:10%;height:auto;'><?php echo $phone;?></td>
    <td style='width:6%;height:auto;'><?php echo $email;?></td>
    <td style='width:6%;height:auto;'><?php echo $password;?></td>
     <td style='width:5%;height:auto;'><?php echo settable($conn,'common_name',$admin_user,'name');?></td> 
    <td style='width:10%;height:auto;'><?php if($active == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
   
    <td style='width:7%;height:auto;'><?php if($view == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>

  

   
  <td>
  <button type="button" id='<?php echo $row["id"];?>' class="btn btn-outline-secondary update">UPDATE</button>
<button type="button" id='<?php echo $row["id"];?>' class="btn btn-outline-danger delete">DELETE</button>
      </td>
  </tr>
    <?php }  ?>


    </tbody>
</table>

<?php }else{
     echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW</h1>";
} ?>
<?php }else{
    echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW </h1>";
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
        if(ac == 1){
            $('#active').val(0); 
         } else {
            $('#active').val(1); 

         }
    });
   
    $('#view').on('click',function(e){
      // e.preventDefault();
        var ve = $('#view').val();
        if(ve == 1){
            $('#view').val(0); 
           
         } else {
            $('#view').val(1); 
         }
    });

   
//end check
 
    $("#delete_d").on("click",function(e){
        e.preventDefault();
  
        var table =$("#table").val();

        if(deleteitem != ""){
        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:{delete:"delete",id:deleteitem,table:table},
            success:function(data){
               $("#pop").trigger("reset");
               $("#show_box").hide();
                window.location.reload();
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
              if(data == 1){
                    $("#pop").trigger("reset");
                    $("#show_box").hide();
                 window.location.reload();
           }else{
            $("#text2").val(data);
           }
            }
        })
});

///////// update function click event ////////
var table_id;
    $(".update").on('click',function(e){
        $("#show_box").show();
        $("#submit").val("update");
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
        $('#table1').val('');
    });


//////////database to get value

function gatdata(e){
     
        var table =$("#table").val();




        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:{get_update:"get_update",table:table,id:table_id},
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
             $("#view").val(obj.view);
             $("#active").val(obj.active);


            //  $("#linking").attr("src",obj.username);
            mycheck();
             
            }
        })
      
}
function mycheck(){
         var ac = $("#view").val();
        if(ac == "1"){
        $("#view").prop('checked', true);
         
         var ac = $("#active").val();
        if(ac == "1"){
        $("#active").prop('checked', true);
         }
        
        }
}
  });


</script>
</html>