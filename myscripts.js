jQuery(document).ready(function(){
	//var currentVal=0;
	
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
         currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
			currentVal + 1
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
		$.ajax({  
	
         type:"POST",  
         url:"ajax-action.php",  
         data:{val:currentVal,id:fieldName},  
         success:function(){  
            window.location.href = "cart.php"; 
         }  
		 
      }); 
		
		
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 1) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
			$.ajax({  
	
			 type:"POST",  
			 url:"ajax-action1.php",  
			 data:{val:currentVal,id:fieldName},  
			 success:function(){  
				window.location.href = "cart.php"; 
			 }  
		  }); 
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(1);
        }
		
    });
});
