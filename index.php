
<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>Register</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
        $(document).ready(function(){
        		checkstatus()
		$('#loginbutton').on('click', function() {
			var btntype = $(this).text();
			var thisForm = this;
			var username = $("#loginusername").val();
			var password = $("#loginpassword").val();
			
			var dataString = 'username='+username+'&password='+password+'&type=Login';
			
			if(dataString && !isBlank(username) && !isBlank(password)){
			
			
			$.ajax({
                        	type: "POST",
                        	url: "login.php",
                        	data:dataString,
                        	datatype: 'json',
                        	success: function (data) {
                        		obj = JSON.parse(data);
                        		if(obj.type=="SUCCESS"){
                        			checkstatus()
                        		}else{
                        			alert("Failed");
                        		}
                        		
                        	}
                        });
                        
                        
				
			
			}else{
				alert("complete all field");
			}
		});
		
		$('#regbutton').on('click', function() {
			var username = $("#regusername").val();
			var email = $("#regemail").val();
			var password = $("#regpassword").val();
			var dataString = 'username='+username+'&email='+email+'&password='+password+'&type=Register';
			if(dataString && !isBlank(username) && !isBlank(password) && !isBlank(email)){
				if(!ValidateEmail(email)){
				}else{
					$.ajax({
                        			type: "POST",
                        			url: "login.php",
                        			data:dataString,
                        			datatype: 'json',
                        			success: function (data) {
                        				obj = JSON.parse(data);
                        				if(obj.type=="SUCCESS"){
                        					checkstatus()
                        				}else{
                        					alert("Failed");
                        				}
                        			}
                        		});
                        	}
				
			
			}else{
				alert("complete all field");
			}
			
		});
		
		$('#logoutbutton').on('click', function() {
			var dataString = 'type=Logout';
			
			
			$.ajax({
                        	type: "POST",
                        	url: "login.php",
                        	data:dataString,
                        	datatype: 'json',
                        	success: function (data) {
                        		obj = JSON.parse(data);
                        		if(obj.type=="SUCCESS"){
                        			checkstatus()
                        		}else{
                        			alert("Failed");
                        		}
                        	}
                        });
				
			
			
		});
		
		$('#logshowbutton').on('click', function() {
			$('#login').show();
                        $('#register').hide();
                        $('#logout').hide();
			
		});
		
		$('#regshowbutton').on('click', function() {
			$('#login').hide();
                        $('#register').show();
                        $('#logout').hide();
			
		});
                
                function checkstatus(){
                        console.log("click");
                        $.ajax({
                        	type: "POST",
                        	url: "status.php",
                        	success: function (data) {
                        		console.log(data);
                        		obj = JSON.parse(data);
                        		if(obj.type=="ACTIVE"){
                        			$('#login').hide();
                        			$('#register').hide();
                        			$('#logout').show();
                        		}else{
                        			$('#login').show();
                        			$('#register').hide();
                        			$('#logout').hide();
                        		
                        		}
                        	}
                        });
                }
                
                function isBlank(str) {
    			return (!str || /^\s*$/.test(str));
		}
		
		function ValidateEmail(mail) {
 			if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(mail)){
    				return (true)
  			}
    			alert("You have entered an invalid email address!")
    			return (false)
		}

        });

</script>

</head>  
<body>


<div class="container">
	<div id="login">
		<form action="" method="post">
		Username: <input id="loginusername" type="text" name="username"><br>
		Password: <input id="loginpassword" type="password" name="password"><br>
		<input type="button" name="Login" id="loginbutton" value="Login">
		</form>
		<button name="Reg" id="regshowbutton">New User, Register</button>
	</div>
	<div id="register">
		<form action="" method="post">
                Username: <input id="regusername" type="text" name="username"><br>
                E-mail: <input id="regemail"  type="text" name="email"><br>
                Password: <input id="regpassword" type="password" name="password"><br>
                <input type="button" name="Register" id="regbutton" value="Register">
                </form>
                <button name="Log" id="logshowbutton">Have Account, Login</button>
	</div>
	<div id="logout">
		<button name="Logout" id="logoutbutton"> Logout</button>
	</div>
</div> 
</body>
</html>

