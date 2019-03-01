$( document ).ready(function() {
	$.ajax({
			type:'post',
			url: 'http://localhost/cultivo/api/view_all_blogs.php',
			data: {type:'blog', status:'1'},
			dataType:'JSON',
				      success:function(data){
				        console.log(data);
				        if(data.status==true)
	        			{
	        				 $('#blog').empty();
					        for(var i=0;i<data.response.length;i++)
					        {
					        	var id=data.response[i].id;
					        	var created=data.response[i].created;
					        	var image=data.response[i].image;
					        	var bold_title=data.response[i].bold_title;
					        	var context=data.response[i].context;
					        	var date = created.split(' ')[0];
					        	var time = created.split(' ')[1];
					        	if(image==null || image==" ")
					        	{
					        		var image_url='http://localhost/cultivo/uploads/download.png';
					        	}
					        	else
					        	{
					        		var image_url='http://localhost/cultivo/uploads/'+image;
					        	}
					        	console.log(image_url);

					        	if(status==1)
					        	{
					        		var status_detail='Active';
					        		var color='green';
					        	}
					        	else if(status==0)
					        	{
					        		var status_detail='Inactive';
					        		var color='red';
					        	}

					        	$('#blog').append(' <div class="blog-inline-content" id="blog"><div class="col-md-8"><div class="left-content"><small class="sm-title">'+context+'</small><h2 class="lg-title">'+bold_title+'</h2><h5 class="cal">'+date+'</h5></div></div><div class="col-md-4"><div class="right-image"><img src="'+image_url+'" alt="" class="img-fluid green-border" alt="" class="img-fluid"></div></div></div>');



	        				}
	        			}

	        			 if(data.status==false)
				        {
				        	$('#blog').append('<div>No Blog Found</div>');

				        }
				       }
				   });
				      	
});