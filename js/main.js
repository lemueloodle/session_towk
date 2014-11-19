$(document).ready(function(){

	var x = $('body').attr('dtx-ox'); //Get the value of session 
  	arrayx = []; //Create an array for json
	$.ajax({
      url: '../php/query.php',
      data: {
        key: x
      },
      type: 'POST',
      cache: false,
      dataType: "json",
      success: function(data){
           $.each(dataT, function(key, val){
              arrayx.push(data[key]);
          });
       }
   });

});