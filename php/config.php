<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<?php
	echo '<div style="display:none">';
	session_start();
	echo '</div>';
		
	$admin_name="your admin_name here";// Place yout admin_name here. To get go to your Chat API admin panel. 
	$admin_id="your admin_id here";// Place yout admin_id here. To get go to your Chat API admin panel. 
	$admin_key="your admin_key here";//	place yout admin_key here. To get go to your Chat API admin panel. 
	$site_id="your site_id here";// place yout site_id here. To get go to your Chat API admin panel. 
	if(!isset($_SESSION['guest_id']))
	{
		$a=rand(10000,99999);
		$b=substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"),0, 1) . substr(str_shuffle("aBcEeFgHiJkLmNoPqRstUvWxYz"),0, 4);
		$guest_id=$b.$a;
		$_SESSION['guest_id']=$guest_id;
	}
	$guest_id=$_SESSION['guest_id'];

	
	
?>
