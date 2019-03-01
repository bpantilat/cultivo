$( document ).ready(function() {

	const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
	$.ajax({
			type:'post',
			url: api_url+'view_all_blogs.php',
			data: {type:'blog', status:'1'},
			dataType:'JSON',
				      success:function(data){
				        console.log(data);
				        if(data.status==true)
	        			{
	        				 $('#view_blog').empty();
	        				 localStorage.setItem('blog-count',6);
					        for(var i=0;i<6;i++)
					        {
					        	var id=data.response[i].id;
					        	var created=data.response[i].created;
					        	var title=data.response[i].bold_title;
					        	var status=data.response[i].status;
					        	var image=data.response[i].image;
					        	var bold_title=data.response[i].bold_title;
					        	var context=data.response[i].context;

					        	var date = created.split(' ')[0];
					        	var day = date.split('-')[2];
					        	var month = date.split('-')[1];

					        	// var date=new Date();
					        	var month1 = monthNames[parseInt(month)-1];
					        	var date1=day+' '+month1;


					       
					      
					        	if(image==null || image==" ")
					        	{
					        		var image_url1=image_url+'download.png';
					        	}
					        	else
					        	{
					        		var image_url1=image_url+image;
					        	}
					        	console.log(image_url);

					        	if(status==1)
					        	{
					        		var btn_title='Disable';
					        		var btn_class='btn-disable Disable';
					        	}
					        	else if(status==0)
					        	{
					        		var btn_title='Active';
					        		var btn_class='btn-blue Active';
					        	}
					        	$('.blog-info').append('<div class="blog-inline-content"><div class="col-md-8"><div class="left-content"><small class="sm-title">'+context+'</small><a href="article.php?id='+id+'" class="link__details"><h2 class="lg-title">'+bold_title+'</h2></a><h5 class="cal">'+date1+'</h5></div></div><div class="col-md-4"><div class="right-image"><img src="'+image_url1+'" alt="Blog 01" class="img-fluid blog-image"></div></div></div>');


	        				}
	        			}

	        			 if(data.status==false)
				        {
				        	$('#view_blog').append('<div style="text-center">No Blog Found</div>');

				        }
				       }
				      	

	});

	$('#load_more_blog').click(function()
{
	var count=localStorage.getItem("blog-count");
	var count2=parseInt(count)+4;
	localStorage.setItem("blog-count",count2);
	$.ajax({
			type:'post',
			url: api_url+'view_all_blogs.php',
			data: {type:'blog', status:'1'},
			dataType:'JSON',
				      success:function(data){
				        console.log(data);
				        if(data.status==true)
	        			{
	        				console.log(data.response.length)
	        				

	        					for(var i=count;i<count2;i++)
					        	{
					        		if(i<data.response.length)
					        		{
							        	var id=data.response[i].id;
							        	var created=data.response[i].created;
							        	var title=data.response[i].bold_title;
							        	var status=data.response[i].status;
							        	var image=data.response[i].image;
							        	var bold_title=data.response[i].bold_title;
							        	var context=data.response[i].context;
							        	var date = created.split(' ')[0];
							        	var day = date.split('-')[2];
							        	var month = date.split('-')[1];

							        	// var date=new Date();
							        	var month1 = monthNames[parseInt(month)-1];
							        	var date1=day+' '+month1;
							      
							        	if(image==null || image==" ")
							        	{
							        		var image_url1=image_url+'download.png';
							        	}
							        	else
							        	{
							        		var image_url1=image_url+image;
							        	}
							        	console.log(image_url);

							        	if(status==1)
							        	{
							        		var btn_title='Disable';
							        		var btn_class='btn-disable Disable';
							        	}
							        	else if(status==0)
							        	{
							        		var btn_title='Active';
							        		var btn_class='btn-blue Active';
							        	}

							        	$('.blog-info').append('<div class="blog-inline-content"><div class="col-md-8"><div class="left-content"><small class="sm-title">'+context+'</small><a href="article.php?id='+id+'" class="link__details"><h2 class="lg-title">'+bold_title+'</h2></a><h5 class="cal">'+date1+'</h5></div></div><div class="col-md-4"><div class="right-image"><img src="'+image_url1+'" alt="Blog 01" class="img-fluid blog-image"></div></div></div>');
						        	}
						        else
			        				{
			        					$("#load_more_blog").hide();
			        				}

		        				}

	        				}
	        			

					        
	        

	        			 if(data.status==false)
				        {
				        	$('.blog-info').append('<div style="text-center">No Blog Found</div>');

				        }
				       }
		});


	
});

	
});


// $(document).on('click','.active',function(){
// var action ='change_status';
// $("#response-msg").removeClass('fail');
// $('#response-msg').removeClass('success');
// if (confirm("Are you sure you want to change the status")) 
// {
// 	$ajax({
// 		type:'post',
// 		url:'http://localhost/cultivo/api/change_status.php',
// 		data:{type:'blog', status:'1'},
// 		dataType:'JSON',
// 		success:function(data)
// 		console.log(data);
// 			if(data.status==true)
// 	        		{
// 			            $('#response-msg').text();
// 			            $('#response-msg').removeClass("fail");
// 			            $('#response-msg').text(data.response);
// 			            $('#response-msg').addClass("success");
			                
// 			         }  
// 			  else if (data.status=="fail")
// 			         {
// 			  		 $('#response-msg').text();
// 			  		 $('#response-msg').removeClass("success");
// 			  		 $('#response-msg').append(data.response);
// 			  		 $('#response-msg').addClass("fail");
			                
// 			              } 
// 	}
// }