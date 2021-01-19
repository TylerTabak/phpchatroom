<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$a =(isset($_SESSION['name']))?$_SESSION['name']:''; 
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<script type="text/javascript" src="script.js"></script>
		<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
    
        // get username by echoing session veriable   
        var name = '<?php echo $a ?>';
        
    	// strip tags
    	name = name.replace(/(<([^>]+)>)/ig,"");
    	  	
    	// kick off chat
        var chat =  new Chat();
    	$(function() {
    	
    		 chat.getState(); 
    		 
    		 // watch textarea for key presses
             $("#sendie").keydown(function(event) {  
             
                 var key = event.which;  
           
                 //all keys including return.  
                 if (key >= 33) {
                   
                     var maxLength = $(this).attr("maxlength");  
                     var length = this.value.length;  
                     
                     // don't allow new content if length is maxed out
                     if (length >= maxLength) {  
                         event.preventDefault();  
                     }  
                  }  
    		 																																																});
    		 // watch textarea for release of key press
    		 $('#sendie').keyup(function(e) {	
    		 					 
    			  if (e.keyCode == 13) { 
    			  
                    var text = $(this).val();
    				var maxLength = $(this).attr("maxlength");  
                    var length = text.length; 
                     
                    // send 
                    if (length <= maxLength + 1) { 
                     
    			        chat.send(text, name);	
    			        $(this).val("");
    			        
                    } else {
                    
    					$(this).val(text.substring(0, maxLength));
    					
    				}	
    				
    				
    			  }
             });
            
    	});
    </script>	
	
	</head>
	<body class="loggedin" onload="setInterval('chat.update()', 1000)">
		<nav class="navtop">
			<div>
				<h1>Welcome <?=$_SESSION['name']?>!</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div id="page-wrap" class="content">

			<h2>YEG Chat</h2>
    
			<p id="name-area">Chatting as <?=$_SESSION['name']?></p>
    
			<div id="chat-wrap"><div id="chat-area"></div></div>
    
			<form id="send-message-area">
				<p>Your message: </p>
				<textarea id="sendie" maxlength = '100'></textarea>
			</form>

		</div>
		
	</body>
</html>