<?php 
$path = Request::root()."/";
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>::MX1 Shop::</title>
  <script src="<?php echo $path;?>js/jquery-1.10.2.js"></script>
  <script src="<?php echo $path;?>js/bootstrap.min.js"></script>
  <script src="<?php echo $path;?>js/bootstrap-datepicker.js"></script>
  <script src="<?php echo $path;?>js/func.js"></script>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap-theme.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/bootstrap-datepicker.css'>
  <link rel='stylesheet' href='<?php echo $path;?>css/AdminLTE.css'>
  <input  type="hidden" name="rootPath" id="rootPath" value="<?php echo $path?>">
  <script type="text/javascript">
  function checkLogin(){
  	$('#sp_user').html("");
  	$('#sp_pass').html("");
  	if($('#userid').val()==""){
  		$('#userid').focus();
  		$('#sp_user').html("**กรุณากรอก User Name");
  		return false;
  	}
  	if($('#password').val()==""){
  		$('#password').focus();
  		$('#sp_pass').html("**กรุณากรอก password");
  		return false;
  	}
  	var path = $('#rootPath').val();
    var url = path+"backoffice/Login";
    $.post(url,{userid:$('#userid').val(),password:$('#password').val()},function(msg){
    	if(!msg){
    		//alert("Username or Password Incorrect");
    		$("#sp_incorrect").html("**Username or Password Incorrect");
    	}
    	else{
    		window.location.href = path+"backoffice/Order";
    	}
    });
  }
  </script>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);
	</style>
	<style type="text/css">
		.bg_tb{
			background-color: #5bc0de;
		}
	</style>
</head>
<body style="background-color: #000000;">
	        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <form action="Login" method="post" >
                <div class="body bg-gray">
                    <div class="form-group">
                    <span style="color:red"; id="sp_user"></span>
                        <input type="text" id="userid" name="userid" class="form-control" placeholder="User Name"/>
                    
                    </div> 
        
                    <div class="form-group">
                    <span style="color:red"; id="sp_pass"></span>
                        <input type="password" id="password" name="password" class="form-control" placeholder="Password"/>    	
                    <span style="color:red"; id="sp_incorrect"></span>
                    </div>          
                </div>
                <div class="footer">                                                               
                    <button type="button" onclick="checkLogin();" class="btn bg-olive btn-block">Sign me in</button>  
                </div>
            </form>
        </div>
</body>
</html>