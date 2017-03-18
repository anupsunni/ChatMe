$(document).ready(function(){
function notify(){
	$.ajax({
    url: 'php/notifier.php', 
    success: function(mc){
    if (mc!='<strong>NOTHING NEW</strong><script src="js/nsc.js"></script>') {
        
             $("#Not").toggleClass("blue");
            /*alert(mc);*/
    }else{
            $("#Not").removeClass("blue");
    }
  }
  });

} notify();

var interval=setInterval(function(){ notify();

},1500);
    var i=1;
	$("#Not").click(function(){
		if (i%2==0) {$(".ntdv").hide(100);i--;}
		else{ $(".ntdv").show(100);i++;}

    $.ajax({
    url: 'php/notifier.php', 
    success: function(mc){
     $(".ntdv").html(mc);
    }
  });

	});
  $("#unclick").click(function(){
    $(".ntdv").hide(100);i=1;
  });
  

});