$(document).ready(function(){
  var temp=0;
  check();
 $('.messagediv').scrollTop($('.messagediv')[0].scrollHeight);

    $(".textmessagebox").keypress(function(e){
         if(e.which == 13) {
        var message=$("input").val();
          $('.messagediv').scrollTop($('.messagediv')[0].scrollHeight);


if ((message!="")){
          $.post('php/sendmessage.php',{message:message},function(fire) {
          $("input").val("");
        });}


    }
    });

function check(){

  $.ajax({
    url: 'php/packet.php', 
    success: function(mc){
      var info=mc.split('fly');
      temp=info[0];
      
    }
  });

  $.ajax({
    url: 'php/chatimploder.php', 
    success: function(mesg){

      $('.messagediv').html(mesg);

    }});
}


function appender(x){

  var mx=x;
$.post('php/chatchecker.php',{mx:mx},function(data) {
        

          $.ajax({
    url: 'php/packet.php', 
    success: function(mc){
      var info=mc.split('fly');
      temp=info[0];
    }
  });

          $('.messagediv').append(data);
        });
}

var interval = setInterval(function(){

  $.ajax({
    url: 'php/packet.php', 
    success: function(inf){
      var info=inf.split('fly');
      var ctr=info[0];
      var lst=info[1];
      var interval=setInterval(function(){ 
    if(($('.messagediv').scrollTop() + $('.messagediv').innerHeight())>=0.80*$('.messagediv')[0].scrollHeight){
    $('.messagediv').scrollTop($('.messagediv')[0].scrollHeight);
    }
    }, 250);

    if (ctr-temp>=1) {

      appender(ctr-temp);
    }else if (ctr-temp<0) {check();}

      if (lst=='1') {$('.online').html(" is <strong>Online</strong>");}
      else{$('.online').text(" is Offline");}
    }
  });

  },400);
  
  $(".EC").click(function(){
        ctr=0;temp=0;
        var a=1;
        $.post('php/erasechat.php',{a:a},function(erasE) {
          check();
        });
    });

var interval=setInterval(function(){


$.ajax({
    url: 'php/updatels.php', 
    success: function(mc){
      if (!mc) {alert("There has been an error in the server");}
    }
  });


},5000);

});