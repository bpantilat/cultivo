$( document ).ready(function() {
$(document).on('click','.login',function(){
	$('.error_text').empty();
	var email=$("#email").val();
	var password=$("#password").val();
	if(email=='' || password=='')
	{
		if(email=='')
	      {
	       $('#email').after('<div class="required-error" >This field should not empty.</div>');
	        $('#email').css({"border":"red solid 1px"});
	      }
	      if(password=='')
	      {
	      	$('#password').after('<div class="required-error" >This field should not empty.</div>');
	        $('#password').css({"border":"red solid 1px"});
	      }
	}
	else
    {
    	
    	if(!validateEmail(email))
	      {
	       $('#email').after('<div class="required-error" >Invalid Email.</div>');
	        $('#email').css({"border":"red solid 1px"});
	      }
    
       	$('.error_text').removeClass('fail');
        $(".error_text").empty();
        $( "#login-form" ).submit();
    }
});

 $('#forget_password').click(function()
 {

    var email=$('#email1').val();
    if(email=='')
          {
           $('#email1').after('<div class="required-error" >This field should not empty.</div>');
            $('#email1').css({"border":"red solid 1px"});
          }
          else if(!validateEmail(email))
          {
           $('#email1').after('<div class="required-error" >Invalid Email.</div>');
            $('#email1').css({"border":"red solid 1px"});
          }
          else
          {

    $.ajax({
            type:'post',
            url: api_url+'forget_password.php',
            data:{email:email},
            dataType:'JSON',
                      success:function(data){
                        console.log(data);
                        if(data.status==true)
                          {
                            $('#response-msg1').text();
                            $('#response-msg1').removeClass("fail");
                            $('#response-msg1').append(data.response);
                            $('#response-msg1').addClass("success");
                            
                          }  
                          else if (data.status==false)
                          {
                            $('#response-msg1').text();
                            $('#response-msg1').removeClass("success");
                            $('#response-msg1').append(data.response);
                            $('#response-msg1').addClass("fail");
                          } 
                       }
    });
}
 });
});