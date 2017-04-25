/* chatbox codes */
$(document).ready(function(){

	$('.max_min').click(function(){
		$('.msg_wrap').slideToggle('slow');
		$('.max_min').toggleClass("fa-window-maximize");
		$('.max_min').toggleClass("fa-window-minimize");
		$(".emogi_panel").addClass("hide");
	});
	
	$('.end_chat').click(function(){
		$('.msg_wrap').show();
		close_chat();
	});
	
	$('.user').click(function(){

		$('.msg_wrap').show();
		$('.msg_box').show();
	});
	
	jQuery(
  function($)
  {
    $('.msg_body').bind('scroll', function()
	  {
		if($(this).scrollTop() + $(this).innerHeight()>=$(this)[0].scrollHeight)
		{
		  rade();
		}
	  })
  }
);
	
$("#wait").css("display", "none");

function rade() {
		
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("status").innerHTML = xhttp.responseText;
    }
  }; 
  xhttp.open("GET", "php/reply.php?dest=recieved", true);
  xhttp.send();
  
}

$(".emogi_panel i").click(function(){
	classes=$(this).attr("class");
	$(".emogi_panel").addClass("hide");
	send("emoji:"+classes);
});
	
function send(str) {
	$(document).ajaxStart(function(){
	$("#wait").css("display", "block");
	});
    $(document).ajaxComplete(function(){
        $("#wait").css("display", "none");
		 $('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
    });
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
     document.getElementById("status").innerHTML = xhttp.responseText;
    }
  }; 
  xhttp.open("GET", "php/reply.php?message="+str+"&dest=send", true);
  xhttp.send();
  $("#message_list").load("php/message_list.php");
}

$('.send_msg').keypress(
    function(e){
		$(".emogi_panel").addClass("hide");
        if (e.keyCode == 13) {
            e.preventDefault();
            var msg = $(this).val();
			$(this).val('');
			if(msg.length!=0)
			{
				send(msg);
				$('.msg_body').scrollTop($('.msg_body')[0].scrollHeight);
			}
        }
    });
	
});

$(".emogi_panel").addClass("hide");
$(".all_emoji").click(function(){
	$(".emogi_panel").toggleClass("hide");
});

$( ".msg_box" ).resizable();

function close_chat() {
	$(".confirm_close").fadeIn("fast");
	$(".emogi_panel").addClass("hide");
}
function confirm_close()
{
	var xhttp = new XMLHttpRequest();
	  xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			 $(".confirm_close").fadeOut("slow");
			 $("#message_list").load("php/message_list.php");
		}
	  };
	  xhttp.open("GET", "php/reply.php?dest=close", true);
	  xhttp.send(); 
}
$(".water_mark").click(function(){ window.location.assign("http://stylpix.com/chat_box/index.php");});
/* chatbox codes end*/