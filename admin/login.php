
<?php

include_once("server/server.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>




<!-- pop meassge waring -->
<div class="pop-massage" id='pop-massage' style="display:none">
  <h3 id='text1'><span id='text3'>Danger!</span>  <span id='close'class="material-symbols-outlined close">close</span></h3>
  <p id='text2'>
  
  </p>
</div>


<!-- end -->
 
<div class="modal-body box">

<p  style='font-size:35px;color:red;'><b>LOGIN TO E-COM</b></p>
<p><b style='font-size:20px;color:red;'>ALL KINDS OF CLOTHS HERE<b></p>
<hr>
<form method="post" id="pop" name='from-model' action="" enctype="multipart/form-data">
  


<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Username</span>
<input type="text" class="form-control" placeholder="Username" name='username' id='username' aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
<span class="input-group-text" id="basic-addon1">Password</span>
<input type="password" length='8' class="form-control" placeholder="password" name='password' id='password' aria-label="Username" aria-describedby="basic-addon1">
</div>

</form>
<br>
<button type="button" name='submit' id='submit'class="btn btn-primary">Login</button>
<button type="button" name='submit' class="btn btn-primary">Register</button>
<br>
</div>




</body>

<script src="../jquery-3.6.3.min.js"></script>
<script>
    

    $(document).ready(function(){
        

        $("#submit").on("click",function(e){
        e.preventDefault();

        var username =$("#username").val();
        var password =$("#password").val();
        if(username != "" && password !=""){
        $.ajax({
            url:"server/admin.php",
            type:"POST",
            data:{admin_login:"admin_login",username:username,password:password},
            success:function(data){
               if(data == "success"){
              location.href="index.php";
               }
            //    alert(data);
           
            }
        })
    }else{
        alert("DATA INSERT FOR LOGIN");
    }
     });


        $('#close').on('click',function(e){
              $('#pop-massage').hide();
        });
    });


</script>
<script type="text/javascript">
       if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
    </script>
</html>

