(function($) {
    "use strict";
		  $("#defualt" ).on('click',function(){
			  $("#color" ).attr("href", "css/colors/defualt.css");
			  return false;
		  });
		  
		   $("#green" ).on('click',function(){
			  $("#color" ).attr("href", "css/colors/green.css");
			  return false;
		  });
		  
		  $("#purple" ).on('click',function(){
			  $("#color" ).attr("href", "css/colors/purple.css");
			  return false;
		  });
		 
		  // picker buttton
		  $(".picker_close").click(function(){
			  	$("#choose_color").toggleClass("position");
			  
		   });
		  
})(jQuery);