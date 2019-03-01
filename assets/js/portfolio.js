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
					        for(var i=0;i<data.response.length;i++)
					        {
					        	var id=data.response[i].detail.id;
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
	            					// for(var j=0;j<27;j++)
	            					// {
	            					// 	if(j<bold_title.length)
	            					// 	{
	            						html = html+bold_title.substr(x+(x*26),26+(x*26));

	           
	            					// 	}
	            					// }
	            					html=html+'</span>';
	            					console.log(html);
	            				}
	            				html1=html1+html;
            					console.log(data.response[i].tags.length);

                                   var tags='';
            					for(var j=0;j<data.response[i].tags.length;j++)
					        	{		
					        		var tag_name=data.response[i].tags[j].tag_name;
					        		tags=tags+'<li>'+tag_name+'</li>';

					        	}
					        	 


                                 if(i%2==0)
                                 {
                           			$('#abc').append('<div class="project-blog"><a href="#" class="link-blog"><div class="img-pro"><img src="'+image_url1+'" alt="Porject 1" class="img-fluid"></div><ul class="inline-list">'+tags+'</ul><div class="title"><h2>'+html1+'</h2></div></a></div>');

                                 }
                                 else
                                 {
                                $('#abcd').append('<div class="project-blog"><a href="#" class="link-blog"><div class="img-pro"><img src="'+image_url1+'" alt="Porject 1" class="img-fluid"></div><ul class="inline-list">'+tags+'</ul><div class="title"><h2>'+html1+'</h2></div></a></div>');
// console.log(data.response);
                                 }


	        				}
	        			}

				        }
				       
	});
	
});