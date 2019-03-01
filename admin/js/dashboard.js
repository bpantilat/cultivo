$( document ).ready(function() {
	 		$.ajax({
				      type:'post',
				      url:api_url+'dashboard.php',
				      	dataType:'JSON',
				      	success:function(data){
				        console.log(data.status);
				      	if(data.status==true)
			              {
			              	console.log(data);
			              	var blog_count=data.response[0].blog_count;
			              	var portfolio_count=data.response[1].portfolio_count;
			                $('.blog_count').append(blog_count);
			                $('.portfolio_count').append(portfolio_count);
			              }  
			             
						}
					  
					
					});
	 
});