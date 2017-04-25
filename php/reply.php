<?php
	
	require("config.php");
	
	$chat_id=$_SESSION['chat_id'];
	
	$dest=$_GET['dest'];
	if(strcmp($_SESSION['chat_id'],"colapse"))
	{
		if(strcmp($dest,"send")==0)
		{
			$raw_msg=$_GET['message'];
			$message=str_replace(" ", "|", $raw_msg);
			
			reply("http://www.stylpix.com/chat_box/api/reply_messages.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&chat_id=$chat_id&dest=$dest&message=$message");
		
		}
		else if(strcmp($dest,"recieved")==0)
		{
			reply("http://www.stylpix.com/chat_box/api/reply_messages.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&chat_id=$chat_id&dest=$dest");
		}
		else if(strcmp($dest,"close")==0)
		{
			reply("http://www.stylpix.com/chat_box/api/reply_messages.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&chat_id=$chat_id&dest=$dest");
			$_SESSION['chat_id']="colapse";
		}
	}
	
	
	function reply($url){
	global $output;
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	echo $output;
	}
	
?>