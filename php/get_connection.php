<?php

	require("config.php");
	if(!isset($_SESSION['chat_id']) || strcmp($_SESSION['chat_id'],"colapse")==0)
	{
		$host=$_SERVER['HTTP_HOST'];
		connect("http://www.stylpix.com/chat_box/api/connect.php?guest_id=$guest_id&admin_name=$admin_name&admin_id=$admin_id&admin_key=$admin_key&site_id=$site_id&host=$host");
	}
	function connect($url){
		global $output;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		$output = curl_exec($ch);
		curl_close($ch);
		$json_string=json_decode($output);
		$chat_id=$json_string[0]->chat_id;
		$_SESSION['chat_id']=$chat_id;
	}

?>
