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
</head>
<body>
   
<!-- menubar show all databse and update and remove-->
<div class="left-bar" id='left_menu'>
     <div class="logo">
        <img class="logo-web" src="logo.jpg" alt="">
     </div>

    <?php
  include_once("server/server.php");
  include_once("server/functions.php");
   $table="menu";
   echo "<p style='font-size:0px;'>".$table."</p>";
$sql ="SELECT * FROM $table";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
   
      while ($row = mysqli_fetch_assoc($result)) {

        ?>


<button class="bar" id="tv" onclick="location.href='<?php echo$row['path'];?>'"> 
    <span class="material-symbols-outlined"><?php echo $row["icon"];?></span>
    &emsp; <?php echo $row["name"];?></button>
    

    <?php   } ?>
</div>
   
<!--end menubar-->





<!--home page -->
<div class="right-bar" id='right_menu'>


  <!-- pop meassge waring -->
<div class="pop-massage" id='pop-massage' style="display:none">
  <h3 id='text1'><span id='text3'>Danger!</span>  <span id='close'class="material-symbols-outlined close">close</span></h3>
  <p id='text2'>Red often indicates a dangerous or negative situation.</p>
</div>


<!-- end -->
 <div class="input-set" id="show_box"  style="display:none;"> 

    <div class='set-btn'>
        <a class='name-page'>add item</a>
        <a class="input-btn material-symbols-outlined" id="set">close</a>
    </div>
<form method="post" id="pop" action="" enctype="multipart/form-data">
    
    <div class="row g-3">

        <div class="col-md-6">
          <input type="text" class="form-control" placeholder=' name' name="name" id="name" require>
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" placeholder='path.php' name='path' id='path' require>
        </div>

        <div class="col-md-6">
          <input type="text" class="form-control" placeholder='icon ' name='icon' id='icon' require>
        </div>

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"  name='staff' id='staff'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>STAFF</label>
        </div>

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"  name='admin' id='admin'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>ADMIN</label>
        </div>

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"  name='dev' id='dev'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>DEV</label>
        </div>
       
        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='edit' id='edit'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>EDIT</label>
        </div>

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='remove' id='remove'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>REMOVE</label>
        </div>

        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='update_access' id='update_access'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>update</label>
        </div>
        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='upload' id='upload'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>UPLOAD</label>
        </div>
        <div class="col-md-6">
          <input class="form-check-input" type="checkbox" role="switch"   name='add_set' id='add'>
          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'>ADD</label>
        </div>

      </div>

 
<div class='set-btn'>
<input type="hidden" class="form-control"  name="id" id="id" required>
<input type="hidden" name="table1" id="table1" class="form-control" value="" />
<input type="hidden" name="insertupdate" id="<?php echo $table; ?>" class="form-control" value="insertupdate" />
<input type="hidden" name="table" id="table" class="form-control" value="<?php echo $table; ?>" />

<input  type='submit' class="input-btns"  name='submit' id='submit' >
</div>
</form>

</div>  

<div class='top-bar'>
    <button class="name_b material-symbols-outlined" id='menu_click' style="font-size:30px;">arrow_circle_right</button>
    <div class='name'><?php echo $table?></div>


    <div  style="margin:0px;padding:5px;width:80%;display: flex;align-items: center;border:1px solid black;border-radius:9px;">
     <input type="text"  style="margin:0px;padding:5px;border:1px solid white;" search='name users and path'class="form-control" id="search_product" aria-label="Text input with dropdown button">
     <button class="btn-outline-secondary material-symbols-outlined" style="background:white;color:black;border:1px solid white;border-radius:8px;display:none;margin-left:10px;" id="filter" type="button"  aria-expanded="false">close</button>
    </div>

    <button class="add-action" id='add-action'>add</button>
    <div class="name_profile" id='add-logout'>
        <img style='height:30px;text-align: center;margin:0px;' src='https://upload.wikimedia.org/wikipedia/commons/6/67/User_Avatar.png?20170128013930'/>
        <p style='font-size:12px;margin:0px;'><?php echo $name;?></p>
    </div>
</div>
<!--home page end -->

<form  class="input-set"  id="show_box_d" style="display:none;">
<div class="toast-header">
    <img src="../admin/logo.jpg" style="height: 50px;" class="rounded me-2" alt="...">
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

<table class="table table-bordered border-primary" style="margin-top:80px;width:95%;background:white;color:black;border:1px solid black;">
    <thead style="border:1px solid black;">
        <th>Id</th>
        <th>NAME</th>
        <th>PATH</th>
        <th>ICON</th>
        <th>STAFF VIEW</th>
        <th>ADMIN VIEW</th>
        <th>DEV VIEW</th>
        <th>EDIT</th>
        <th>REMOVE</th>
        <th>UPDATE</th>
        <th>UPLOAD</th>
        <th>ADD</th>
        <th>STATUS</th>
    </thead>
    <tbody id='load'>

    <?php
  
   
$sql ="SELECT * FROM menu";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
   
      while ($row = mysqli_fetch_assoc($result)) {
        foreach($row as $key => $value)
        {  $$key = $value; }
        ?>

  <tr style="border:1px solid black;">
    <td style='width:5%;height:auto;'><?php echo $id;?></td>
    <td style='width:5%;height:auto;'><?php echo $name;?></td>
    <td style='width:5%;height:auto;'><?php echo $path;?></td>
    <td style='width:5%;height:auto;'><?php echo $icon;?></td>

 
    <td style='width:7%;height:auto;'><?php if($staff == 0){?>
      <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td style='width:7%;height:auto;'><?php if($admin == 0){?>
      <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td style='width:7%;height:auto;'><?php if($dev == 0){?>
      <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>

    <td style='width:5%;height:auto;'><?php if($edit == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
 
    <td style='width:7%;height:auto;'><?php if($remove == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td style='width:7%;height:auto;'><?php if($update_access == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td style='width:7%;height:auto;'><?php if($upload == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td style='width:7%;height:auto;'><?php if($add_set == 0){?>
        <p>NOT ACTIVE </P>
      <?php }else{ ?>
        <p>ACTIVE</P>
        <?php }?>
    </td>
    <td>
  <button type="button" id='<?php echo $id;?>' class="btn btn-outline-secondary update" style='margin:2px;'>UPDATE</button>
  <button type="button" id='<?php echo $id;?>' class="btn btn-outline-danger delete" style='margin:2px;'>DELETE</button>
    </td>
  </tr>
    <?php   } ?>


    </tbody>
</table>


</div>
<p id='activeget'>0</p>
<!--end home  page-->


</body>

<script src="../jquery-3.6.3.min.js"></script>
<script>
  $(document).ready(function(){
    $("#set").click (function(){
        $("#show_box").hide();
    });

    $("#close").click (function(){
        $("#pop-massage").hide();
    });

    $("#set_d").click (function(){
        $("#show_box_d").hide();
    });



    $("#add-action").click(function(){
        $("#show_box").show();
        $("#pop").trigger("reset");
        $("#submit").val("insert");
    });


    $('#filter').click(function(){
        
        window.location.reload();
    })


    ///////// menu size change leftbar ////////
   $('#menu_click').click(function(){
    var x = $(".left_menu").width();
    if(x >= "80"){
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

    var table_id;
    $(".update").on('click',function(e){
        $("#show_box").show();
        $("#submit").val("update");
        $("#table1").val("");
        $("#brands").show(); 
        $("#t_name").show();
        $("#common_name").show(); 
        $("#active").show();
        $('.choosedata').css('display',"none");

        if (e.target.id !== e.currentTarget) {
           table_id = e.target.id;
        }
        gatdata();
    });
       
    $('#dev').on('click',function(e){
      // e.preventDefault();
        var up = $('#dev').val();
        if(up == "1"){
            $('#dev').val(0); 
         } else {
            $('#dev').val(1); 
         }
    });

    $('#staff').on('click',function(e){
      // e.preventDefault();
        var ve = $('#staff').val();
        if(ve == "1"){
            $('#staff').val(0); 
         } else {
            $('#staff').val(1);   
         }
    });

    $('#admin').on('click',function(e){
      // e.preventDefault();
        var upa = $('#admin').val();
        if(upa == "1"){
            $('#admin').val(0); 
         } else {
            $('#admin').val(1); 
         }
    });
  
    $('#edit').on('click',function(e){
        var ed = $('#edit').val();
        if(ed == 1){
            $('#edit').val(0); 
            
         } else {
            $('#edit').val(1); 
           
         }
    });
    $('#remove').on('click',function(e){
        var re = $('#remove').val();
        if(re == 1){
            $('#remove').val(0); 
           
         } else {
            $('#remove').val(1); 
           
         }
    });

    $('#upload').on('click',function(e){
      // e.preventDefault();
        var up = $('#upload').val();

        if(up == 1){
            $('#upload').val(0); 
          
         } else {
            $('#upload').val(1); 
            
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

    $('#update_access').on('click',function(e){
      // e.preventDefault();
        var upa = $('#update_access').val();

        if(upa == "1"){
            $('#update_access').val(0); 
           
         } else {
            $('#update_access').val(1); 
            
         }
    });
    $('#add').on('click',function(e){
      // e.preventDefault();
        var upa = $('#add').val();

        if(upa == "1"){
            $('#add').val(0); 
           
         } else {
            $('#add').val(1); 
            
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






var deleteitem;
    $(".delete").on('click',function(e){
        $("#show_box_d").show();
        $("#show_box").hide();
        if (e.target.id !== e.currentTarget) {
           deleteitem = e.target.id;
          // console.log(deleteitem);
        }
    });
//delete item into table  
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
    alert("there is no data avaliable here");
  }
});

// get data each id form table 
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
      $("#id").val(obj.id);
        $("#name").val(obj.name);
        $("#path").val(obj.path);
        $("#icon").val(obj.icon);
        $("#staff").val(obj.staff);
        $("#admin").val(obj.admin);
        $("#dev").val(obj.dev);
        $("#edit").val(obj.edit);
        $("#remove").val(obj.remove);
        $("#view").val(obj.view);
        $("#upload").val(obj.upload);
        $("#update_access").val(obj.update_access);
        $("#add").val(obj.add_set);
        table_set =obj.id;
       
        mycheck();
             
            }
        });
      
}
function mycheck(){
       var ac = $("#staff").val();
        if(ac == "1"){
        $("#staff").prop('checked', true);
         }
         var ac = $("#admin").val();
        if(ac == "1"){
        $("#admin").prop('checked', true);
         }
         var ac = $("#dev").val();
        if(ac == "1"){
        $("#dev").prop('checked', true);
         }   
         var ac = $("#edit").val();
         if(ac == "1"){
        $("#edit").prop('checked', true);
         }
         var ac = $("#remove").val();
        if(ac == "1"){
        $("#remove").prop('checked', true);
         }
         var ac = $("#upload").val();
        if(ac == "1"){
        $("#upload").prop('checked', true);
         }
         var ac = $("#update_access").val();
        if(ac == "1"){
        $("#update_access").prop('checked', true);
         }
         var ac = $("#add").val();
        if(ac == "1"){
        $("#add").prop('checked', true);
         }
         
}
$("#search_product").on('keyup',function(){
    var search_item =$(this).val();
    var table =$("#table").val();
 
    $('#filter').show();
       
    $.ajax({
            url:"server/filter.php",
            type:"POST",
            data:{search:search_item,table:table},
            success:function(data){
               $("#load").html(data);
               
            }
        });
});
});
</script>
</html>