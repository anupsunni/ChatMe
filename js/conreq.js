$(document).ready(function(){
    $("FNDS").click(function(){
      
        var u_id = $(this).attr("id");
        var u_nm = $(this).attr("name");
        $.post('php/con_req.php',{u_id:u_id,u_nm:u_nm},function(info) {
          var i= info;  
        $("#"+u_id).text(info);
        });

    });
});
