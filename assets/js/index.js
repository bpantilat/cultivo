$( document ).ready(function() {
	
	$.ajax({
			type:'post',
			url: api_url+'view_all_portfolios.php',
			data: {type:'portfolio', status:'1'},
			dataType:'JSON',
				      success:function(data){
				        console.log(data);
				        if(data.status==true)
	        			{
					        for(var i=0;i<6;i++)
					        {
					        	var id=data.response[i].detailid;
					        	var created=data.response[i].detail.created;
					        	var status=data.response[i].detail.status;
								var bold_title=data.response[i].detail.bold_title;
					        	var image=data.response[i].detail.image;
					        	if(image==null || image==" ")
					        	{
					        		var image_url1=image_url+'download.png';
					        	}
					        	else
					        	{
					        		var image_url1=image_url+image;
					        	}
					        	var char=bold_title.length;
					        	var mod= Math.ceil(char/26);
					        	var html1='';
					        	var html='';
					        	for(var x=0;x<mod;x++)
					        	{
	            					html=html+'<span>';
	            				
	            						html = html+bold_title.substr(x+(x*26),26+(x*26));

	           
	            					
	            					html=html+'</span>';
	            					console.log(html);
	            				}
	            				html1=html1+html;
            					console.log(html1);

					    
                           			$('#projects').append('<div class="col-md-6"><div class="project-blog"><a href="#" class="link-blog"><div class="img-pro"><img src="'+image_url1+'" alt="Porject 1" class="img-fluid"></div><div class="title"><h2>'+html1+'</h2></div></a></div></div>');

	        				}
	        			}

				        }

	});


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
	        				 localStorage.setItem('blog-count',2);
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
function sleep(ms) {
  return new Promise(resolve => setTimeout(resolve, ms));
}

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
							        	// var html=html+'<div class="blog-inline-content"><div class="col-md-8"><div class="left-content"><small class="sm-title">'+context+'</small><a href="article.php?id='+id+'" class="link__details"><h2 class="lg-title">'+bold_title+'</h2></a><h5 class="cal">'+date1+'</h5></div></div><div class="col-md-4"><div class="right-image"><img src="'+image_url1+'" alt="Blog 01" class="img-fluid blog-image"></div></div></div>';

             //                             ActivityBlog();
							      //   	async function ActivityBlog() {
							      //   		$('.loading').show();
	  										// await sleep(2000);
								        	$('.blog-info').append('<div class="blog-inline-content"><div class="col-md-8"><div class="left-content"><small class="sm-title">'+context+'</small><a href="article.php?id='+id+'" class="link__details"><h2 class="lg-title">'+bold_title+'</h2></a><h5 class="cal">'+date1+'</h5></div></div><div class="col-md-4"><div class="right-image"><img src="'+image_url1+'" alt="Blog 01" class="img-fluid blog-image"></div></div></div>');
							        	// 	$('.loading').hide();
							        	// }
						        	}
						        else
			        				{
			        					// ActivityBlog();
			        					// async function ActivityBlog() {
			        						// $('.loading').show();
	  										// await sleep(2000);
				        					$(".blog-info").hide();
				        				// 	$('.loading').hide();
			        					// }
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