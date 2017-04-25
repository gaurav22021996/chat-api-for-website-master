<?php
	
	require("config.php");
	if(!isset($_SESSION['chat_id']) || strcmp($_SESSION['chat_id'],"colapse")==0 )
	{
		echo '<div class="text-center start_chat" >
				<div class="h4 ">Start chatting..</div>
				<div><img style="width:30%" clasas="img-responsive" src="images/chat-icon.png" /></div>
				<div>Feel free to communicate with us.</div>
				<div><button class="btn btn-sm btn-success" onclick="begin_chat()">Click to begin chat</button></div>
			</div>';
	}
	else
	{
		$chat_id=$_SESSION['chat_id'];
		message_list("http://www.stylpix.com/chat_box/api/all_messages.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&chat_id=$chat_id");
	}
	function message_list($url){
	global $output;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;
	}
	
?>