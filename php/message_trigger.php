<?php

	require("config.php");
	if(isset($_SESSION['chat_id']))
	{
		$chat_id=$_SESSION['chat_id'];
		new_message_trigger("http://www.stylpix.com/chat_box/api/chat_box_message.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&chat_id=$chat_id");
	}
	function new_message_trigger($url){
		global $output;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		
		$not_view=0;
		$json_string=json_decode($output);
		//$count=$json_string[0]->count;
		$not_view=$json_string[0]->not_view;
		$message_count="0";
		
		
		if(strcmp($message_count,$not_view)!=0)
		{
			$_SESSION['message_count']=0;
				echo '<script>
				$("#message_list").load("php/message_list.php");
				$("#views").html("<i id=\"new_msg\"  style=\"color:#09ff10; font-size:12px\"; class=\"glyphicon glyphicon-envelope animated jello infinite\" aria-hidden=\"true\"></i> '.$not_view.' new msg &nbsp;");
				$(".end_chat").hide();
				</script>
			';
		}
		else
		{
			echo '<script>
				$("#views").html("");
				$(".end_chat").show();
				</script>
			';
		}
	}

?>
