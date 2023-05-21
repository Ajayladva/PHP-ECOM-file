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
    $table ="shoes";
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





<!--home page -->
<?php   
$typesusers  = settable($conn,'common_name',$types,"name");

$users = access($conn,'menu',$typesusers,$table);
    if($users == 1){
        
$y = table_show($conn,'userlogin',$ids,"view");
    if($y == 1){
        
        ?>

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
    <?php

   
$sql ="SELECT * FROM  pageauto where table_name='$table'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
   
      while ($row = mysqli_fetch_assoc($result)) {
        foreach($row as $key => $value)
        {  $$key = $value; }
        $table_set = $select_table_name ;
        $where_table = $where_table_name;
        $where_set = $where_serach;
        $select_option_val =$select_option_value;
        $select_show_val =$select_show_value;
        ?>
     <?php    if("yes" == settable($conn,'common_name',$checkbox,'name')){?>
        <div class="col-md-4 brands">  
            <<?php echo $type_box;?> name="<?php echo $database_name; ?>" id="<?php echo $database_name; ?>" class="form-control " >
                <option val=""><?php echo $box_title; ?></option>
                <?php
                   $prods = "SELECT * FROM $table_set where $where_table='$where_set' AND active='1'";
                    // $prod = "SELECT * FROM task where id";
                         $prods .= " ORDER BY id ASC";
                         $run_prods = mysqli_query( $conn, $prods )or die( mysqli_error( $conn ) );
                         while ( $rows = mysqli_fetch_array( $run_prods ) ) {
                 ?>
                 <option value="<?php echo  $rows[$select_option_val]; ?>">
                  <?php echo $rows[$select_show_val]; ?></option>
                <?php } ?>
            </select>
        </div>

   <?php  }else if($type_box =="checkbox"){?>
    <div class="col-md-4 ">
          <input class="form-check-input" type="<?php echo $type_box;?>" role="switch"  val="0" name='<?php echo $database_name; ?>' id='<?php echo $database_name; ?>'>

          <label class="form-check-label" for="flexSwitchCheckDefault" style='width:80%;text-align:left;'><?php echo $box_title; ?></label>
        </div>
  <?php  }else if($database_name =="t_name"){?>
    <div class="t_name">
          <<?php echo $type_box;?> class="form-control" type="<?php echo $label_type;?>" role="switch"  val="0" name='<?php echo $database_name; ?>' id='<?php echo $database_name; ?>'>
   </div>
    <?php }else{?>
        <div class="col-md-6 ">
          <<?php echo $type_box;?> class="form-control" type="<?php echo $label_type;?>" role="switch" placeholder='<?php echo $box_title; ?>'  val="0" name='<?php echo $database_name; ?>' id='<?php echo $database_name; ?>'>
   </div>


<?php }
}?>
       
      
       

        
     
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



<!-- top bar menu -->
<div class='top-bar'>
    <button class="name_b material-symbols-outlined" id='menu_click' style="font-size:30px;">arrow_circle_right</button>
    <div class='name'><?php echo $table?></div>
    <input type="text" class="form-control" id="search_product" placeholder="Search id,name,price">
    <?php   $x = table_show_per($conn,'menu',$table,'add_set');
    if($x == 1){?>
    <button class="add-action" id='add-action'>add</button>
    <?php }?>
    <button class="add-action" id='filter'>RELOAD</button>
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
    <img src="../admin/logo.jpg" class="rounded me-2" alt="..." height='30px'>
    <strong class="me-auto"><?php echo $table;?></strong>
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





<table class="table table-bordered border-primary table table-striped" style="margin-top:80px;width:99%;background:white;color:black;border:1px solid black;">
    <thead style="border:1px solid black;">
        <th>Image</th>
        <th>ID</th>
        <th>NAME</th>
        <th>BRANDS</th>
        <th>DEC</th>
        <th>color</th>
        <th>price</th>
        <th>ACTIVE</th>
        <th>STATUS</th>
    </thead>
    <tbody id='load'>

    <?php

$page=0;

if(isset($_GET['page'])&&$_GET['page']!=""){
    $page = $_GET['page'];
}

$totalpages =0;

//$sql ="SELECT $table.id,$table.name,$table.image,$table.t_name,$table.common_name,$table.price,$table.active,$table.brands,brands.name FROM $table  INNER JOIN brands  ON $table.brands = brands.id;";
$sql ="SELECT * FROM $table";
$results = mysqli_query($conn,$sql);
$total = mysqli_num_rows($results);

$limit =5;

if($total ==0){
    $total=1;
}

$totalpages = ceil( $total / $total )*$limit; 
echo "<p id='".$totalpage = ceil( $total / $limit )."'class='pagecount'></p>";
$newpage = ($totalpages -1) * $page;



$sql .= " LIMIT $newpage, $totalpages";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
     // while ($row = mysqli_fetch_assoc($result)) {
        
        while ( $row = mysqli_fetch_array( $result ) ) {
            foreach($row as $key => $value)
          {  $$key = $value; }
        ?>

    <tr style="border:1px solid black;">
    <td style='width:8%;height:auto;'><img  src='<?php echo $image; ?>' style="height:100px;"></td>
    <td style='width:3%;height:auto;'><?php echo $id;?></td>
    <td style='width:18%;height:auto;'><?php echo $name;?></td>
    <td style='width:8%;height:auto;'><?php  echo settable($conn,'brands',$brands,'name'); ?></td>
    <td style='width:25%;height:auto;'><?php echo $t_name;?></td>
    <td style='width:5%;height:auto;'><?php echo settable($conn,'common_name',$common_name,'name');?></td>
    <td style='width:5%;height:auto;'><?php echo $price;?></td>
    <td style='width:2%;height:auto;'><?php if($active == 1){?>
        <p>ACTIVE </P>
      <?php }else{ ?>
        <p>NOT  ACTIVE</P>
        <?php }?>
    </td>
  <td>
    <?php   $x = table_show_per($conn,'menu',$table,'edit');
    if($x == 1){?>
  <button type="button" id='<?php echo $id;?>' class="btn btn-outline-secondary update" style='margin:2px;'>UPDATE</button><?php } ?>

  <?php   $x = table_show_per($conn,'menu',$table,'remove');
    if($x == 1){?>
  <button type="button" id='<?php echo $id;?>' class="btn btn-outline-danger delete" style='margin:2px;'>DELETE</button><?php } ?>
  
  <?php   $x = table_show_per($conn,'menu',$table,'upload');
    if($x == 1){?>

  <button type="button" id='<?php echo $id;?>' class="btn btn-outline-warning upload" style='margin:2px;'>UPLOAD</button>
<?php }?>
      </td>
  </tr>
    <?php   } ?>


    </tbody>
</table>
<div style='display:flex;align-items: center;text-align:center;margin-left:30%;margin-right:30%;'>
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
                            </diV>
<?php }else{
     echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW</h1>";
} ?>
<?php }else{
    echo "<h1 style='margin-left:20%;margin-top:10%;'>DONT HAVE ACCESS TO VIEW</h1>";
} ?>
<!--end home  page-->
</div>

</body>

<script src="../jquery-3.6.3.min.js"></script>
<script>
        CKEDITOR.replace( 't_name' );
</script>
<script>
    $(document).ready(function(){


/// page change event 
const myname = window.location.search;
const urlparams = new URLSearchParams(myname);
const page = urlparams.get('page');

$('.pagination-next').attr("id",page);

var countid =0;
$('.pagination-next').click(function(e){
         e.preventDefault();
         var totals = $('.pagecount').attr("id");
        if(e.target.id !== e.currentTarget){
          countid = e.target.id;
          if(countid < totals){
             countid++;
             window.location.href = "?page=" + countid ;
          }
    }
});


$('.pagination-pervious').click(function(e){
       e.preventDefault();
       var pervious =  page;
        if(pervious > 0){
            pervious--;
            window.location.href = "?page=" + pervious;
        }
        
});


$('.pagination-first').click(function(e){
       e.preventDefault();
        var last =  $('.pagination-first').attr('id');
        window.location.href = "?page=" + last;     
});

$('.pagination-last').click(function(e){
       e.preventDefault();
       var last =   $('.pagecount').attr("id");
       window.location.href = "?page=" + last;
});

///////// menu size change leftbar ////////
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
  

///////// form open and filed  change boxs ////////
    $("#set").click (function(){
        $("#show_box").hide();
    });

    $("#close").click (function(){
        $("#pop-massage").hide();
    });

    $("#set_d").click (function(){
        $("#show_box_d").hide();
    });


///////pop boxx open 
    $("#add-action").click(function(){
        $("#show_box").show();
        $("#pop").trigger("reset");
        $(".brands").css('display',"block");
        $(".brands_show").css('display',"none");
        $(".common_name").css('display',"block");
        $(".active").css('display',"block");
        $("#price").css('display',"block");
        $("#UPDATE_data").hide();
        $("#submit").show();
        $(".brands_show").html("");

    });

//////////page reload event
    $('#filter').click(function(){
        
        window.location.reload();
    })
    //active check
    $('#active').on('click',function(e){
      // e.preventDefault();
        var ac = $('#active').val();
        if(ac == "1"){
            $('#active').val(0); 
         } else {
            $('#active').val(1); 
         }
    });

   


    //delete function
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

    



///////// update function click event ////////
var table_id;
    $(".update").on('click',function(e){
        $("#show_box").show();
        $(".brands").css('display',"block");
        $(".brands_show").css('display',"none");
        $(".brands_show").html("");
        $("#submit").val("update");
        $('.choosedata').css('display',"none");
        $("#price").css('display',"block");
        $(".brands").css('display',"block");
        $(".common_name").css('display',"block");
        $(".active").css('display',"block");

        if (e.target.id !== e.currentTarget) {
           table_id = e.target.id;
        }
        gatdata();
        $('#table1').val('');

        $('#id').val(table_id);
    });
///////// mupload event function ////////
    $(".upload").on('click',function(e){
        $("#show_box").show();
        
        $("#submit").val("upload");
        $(".common_name").css('display',"none");
        $(".brands").css('display',"none");
        $(".brands_show").css('display',"block");
        $(".brands_show").html(`<select name="brands" id="brands" class="form-control " >
                <option val="">SELECT ITEM</option>
                <?php
                   $prods = "SELECT * FROM common_name where typee='position' AND active='1'";
                    // $prod = "SELECT * FROM task where id";
                         $prods .= " ORDER BY id ASC";
                         $run_prods = mysqli_query( $conn, $prods )or die( mysqli_error( $conn ) );
                         while ( $rows = mysqli_fetch_array( $run_prods ) ) {
                 ?>
                 <option value="<?php echo  $rows[ 'id' ]; ?>">
                  <?php echo $rows['name']; ?></option>
                <?php } ?>
            </select>`);
        $(".active").css('display',"none");
        $("#price").css('display',"none");
        $('.choosedata').css('display',"block");
        if (e.target.id !== e.currentTarget) {
            table_id = e.target.id;
        }
        $("#pop").trigger("reset");
        gatdataupload();
        $('#table1').val('image_gallery');
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


// get data each id form table 
function gatdata(e){
  
        var table =$("#table").val();
        $.ajax({
            url:"server/FUNCTION.php",
            type:"POST",
            data:{get_update:"get_update",table:table,id:table_id},
            success:function(data){
              // alert(data + table_id);
                const text = data;
                const obj = JSON.parse(text, function (key, value) {
               
                   return value;    
            });
             $("#id").val(obj.id);
             $("#name").val(obj.name);
             $("#active").val(obj.active);
             $("#price").val(obj.price);
             $("#brands").val(obj.brands);
             $("#t_name").val(obj.t_name);
             $("#common_name").val(obj.common_name);
             mycheck();
             
            }
        });
      
}
function mycheck(){
       var ac = $("#active").val();
        if(ac == "1"){
        $("#active").prop('checked', true);
         }
}
function gatdataupload(e){
  
  var table =$("#table").val();
  $.ajax({
      url:"server/FUNCTION.php",
      type:"POST",
      data:{get_update:"get_update",table:table,id:table_id},
      success:function(data){
        // alert(data + table_id);
          const text = data;
          const obj = JSON.parse(text, function (key, value) {
         
             return value;    
      });
       $("#id").val(obj.id);
       $("#name").val(obj.name);
       $("#active").val(obj.active);
       $("#price").val(obj.price);
       $("#brands").val(obj.brands);
       mycheck();
       
      }
  });

}
function mycheck(){
 var ac = $("#active").val();
  if(ac == "1"){
  $("#active").prop('checked', true);
   }
}


$("#search_product").on('keyup',function(){
    var search_item =$(this).val();
    var table =$("#table").val();
 
    $('#filter').val('reload');
       
    $.ajax({
            url:"server/FUNCTION.php",
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