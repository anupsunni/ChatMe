$(document).ready(function(){
var temp=0;

function showmessages(){
  $.ajax({
    url: 'php/grouppacket.php', 
    success: function(mc){
      temp=mc;
      
    }
  });



  $.ajax({
    url: 'php/groupchatimploder.php', 
    success: function(mesg){/**/
      
      $('.messagediv2').html(mesg);
    }
  });
}
showmessages();

function appender(x){

  var mx=x;
$.post('php/groupchatchecker.php',{mx:mx},function(data) {
        

          $.ajax({
    url: 'php/grouppacket.php', 
    success: function(mc){
      temp=mc;
    }
  });

          $('.messagediv2').append(data);
        });
}

    $(".textmessagebox").keypress(function(e){
         if(e.which == 13) {
        var message=$("input").val();

      if ((message!="")){
          $.post('php/groupsendmessage.php',{message:message},function(fire) {
            $('.messagediv2').scrollTop($('.messagediv2')[0].scrollHeight);
          $("input").val("");
        });}


    }
    });


    var interval = setInterval(function(){

  $.ajax({
    url: 'php/grouppacket.php', 
    success: function(inf){
      var ctr=inf;
     /* alert(ctr+'|'+temp);*/
      var interval=setInterval(function(){ 
    if(($('.messagediv2').scrollTop() + $('.messagediv2').innerHeight())>=0.85*$('.messagediv2')[0].scrollHeight){
    $('.messagediv2').scrollTop($('.messagediv2')[0].scrollHeight);
    }
    }, 100);

    if (ctr-temp>=1) {
      appender(ctr-temp);
    }else if (ctr-temp<0) {showmessages();}

      
    }
  });

  },1000);



var interval=setInterval(function(){


$.ajax({
    url: 'php/groupupdatels.php', 
    success: function(mc){
      if (!mc) {alert("There has been an error in the server");}
    }
  });


},5000);

});


/*setInterval(function(){ 

if(($('.messagediv2').scrollTop() + $('.messagediv2').innerHeight())>=0.85*$('.messagediv2')[0].scrollHeight){
            $('.messagediv2').scrollTop($('.messagediv2')[0].scrollHeight);
        }

 }, 100);*/