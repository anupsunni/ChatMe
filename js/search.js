$('#srch').keyup(function(){
   var search_inp = $(this).val();

   $.post('php/search.php',{search_inp:search_inp},function(info) {

   	$('#search_results').html(info);

   });

});