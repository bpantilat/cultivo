$( document ).ready(function() {
 	const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
    	var blog_id=$('#blog_id').val();
    	$.ajax({
			type:'post',
			url: api_url+'view_blog_detail.php',
			data:{id:blog_id},
			dataType:'JSON',
			      success:function(data){
			        console.log(data);
			        if(data.status==true)
        			{
				        	var id=data.response[0].id;
				        	var created=data.response[0].created;
				        	var title=data.response[0].bold_title;
				        	var status=data.response[0].status;
				        	var image=data.response[0].image;
				        	var bold_title=data.response[0].bold_title;
				        	var blog_text=data.response[0].blog_text;
				        	var context=data.response[0].context;
				        		var date = created.split(' ')[0];
					        	var day = date.split('-')[2];
					        	var month = date.split('-')[1];

					        	// var date=new Date();
					        	var month1 = monthNames[parseInt(month)-1];
					        	var date1=day+' '+month1;
				        	$('.heading-bd').append('<h2>'+bold_title+'</h2>');
				        	  $("#blog_image").attr("src",image_url+image);
				        	  $('#context').append('<b>'+context+'</b>');
				        	  $('#text').html(blog_text);
				        	  $('#date').html(date1);
				        	  console.log(date1);
				              $('#edit_context').append(context);
                                $('#edit_bold_title').append(title);
                                 // CKEDITOR.instances['edit_blog_text'].setData(blog_text);
				        	
				        	  // console.log(date1);
        			}
	
			       }		


	});



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
					        for(var i=0;i<2;i++)
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
				        	$('.blog-info').append('<div style="text-center">No Blog Found</div>');

				        }
				       }
				      	

	});


});

