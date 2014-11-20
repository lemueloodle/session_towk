$(document).ready(function(){
  $(document).on("click", ".x_send", function(){
  	var x = $(this).attr('pox-ms'); //Get the value of session token
    var y = $('#x_text').val(); //Get the value of the text box
  	arrayx = []; //Create an array for json
    $.ajax({
      url: './php/query.php',
      data: {
        key: x,
        e_data: y 
      },
      type: 'POST',
      cache: false,
      dataType: "json",
      success: function(data){
           $.each(data, function(key, val){
              arrayx.push(data[key]);
          });
          $('.x_display').html(arrayx[0]);
       }
   });
  });
});