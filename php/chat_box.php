<div class="msg_box">
		<div class="msg_head" >
		<span id="head">Let's Talk !!!</span> <span id="online"></span> <span class="end_chat close ion-close-round"></span>  <span class=" close max_min ion-chevron-up">&nbsp;</span> <span id="views"> </span>
		</div>
		<div class="msg_wrap" id="msg_wrap">
			<div class="msg_body">
				<div class="confirm_close text-center">
					<div class="h5">Are you Sure ?</div>
					<div><button class="btn btn-danger btn-sm" onclick='$(".confirm_close").fadeOut("slow");'>No</button> <button class="btn btn-success btn-sm" onclick="confirm_close()">Yes</button></div>
				</div>
				<div id="chat" style="margin-top:5px" >
					
				<?php 
					echo '<div id="message_trigger">';
					require("php/message_trigger.php");
					echo '</div>';	
					echo '<div id="message_list">';
					require("php/message_list.php");
					echo '</div>';
				?>
					
				</div>
				<div id="wait" class="text-primary text-center">sending...</div>
			</div>
			<div class="emogi_panel">
				<?php include("php/emoji.php"); ?>
			</div>
			
			
		<div class="msg_footer">
			<i class="ion-android-happy all_emoji" aria-hidden="true"></i>
			<textarea id="my_message" class="msg_input send_msg" rows="2" placeholder="message..."  ></textarea>
			<div class="water_mark">powered by Stylpix.com</div>
		</div>
	</div>
</div>

	<script src="js/jquery.min.js"></script>
        <script type='text/javascript' src='js/libs/jquery.js'></script>
        <script type='text/javascript' src='js/libs/bootstrap.min.js'></script>
        <script type='text/javascript' src='js/chatbox.js'></script>
		

<script>
		
	function begin_chat() {
	  var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
		
		 $(".start_chat").css("display", "none");
		}
	  }; 
	  xhttp.open("GET", "php/get_connection.php", true);
	  xhttp.send();
	  
	}
	setInterval(function(){$("#message_trigger").load("php/message_trigger.php");},1000);
	
</script>