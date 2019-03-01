$( document ).ready(function() {
	var picture_flag=0;
	$.ajax({
			type:'post',
			url: api_url+'view_all_portfolios1.php',
			data: {type:'portfolio'},
			dataType:'JSON',
				      success:function(data){
				        console.log(data);
				        if(data.status==true)
	        			{
	        				 $('#view_portfolio').empty();
					        for(var i=0;i<data.response.length;i++)
					        {
					        	var id=data.response[i].detail.id;
					        	var created=data.response[i].detail.created;
					        	var tag=data.response[i].detail.tag;
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
					        	 var html='<div class="col-md-12"> <div class="project-blog project-blogs"> <div class="img-pro"> <img src="'+image_url1+'" alt="" class="img-fluid green-border" alt="" class="img-fluid">  </div><div class="right"> <ul class="inline-list" >';


					        
					        	for(var j=0;j<data.response[i].tags.length;j++)
					        	{		
					        		var tag_name=data.response[i].tags[j].tag_name;
					        		html=html+'<li>'+tag_name+'</li>';

					        	}
					        	 
					        	 	html=html+'</ul> <div class="title"> <h2><span>'+bold_title+'</span></h2> </div></div><div class="button-group btn-groups">  <button class="btn btn-green btn-block btn-rounded edit_portfolio"  data-toggle="modal" data-target="#editModal1" name="'+id+'" id="edit_'+id+'">Edit</button> <button class="btn '+btn_class+'" name="'+id+'" id="status_'+id+'" btn-block btn-rounded">'+btn_title+'</button>  </div></div>';
					        	 	$('#view_portfolio').append(html);


	        				}
	        			}

	        			 if(data.status==false)
				        {
				        	$('#view_portfolio').append('<div>No Portfolio Found</div>');
				        }
				       }
				      	

	});
	///upload user image
    $("#upload").change(function() {
    var file = this.files[0]; 
    $('#img').val(file.name);
    if (this.files && this.files[0])
    {
        if(this.files[0].size>100000)
        {
            $('#image-add').append('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
          $('#image-add').css({"border":"red solid 1px"});
            picture_flag=1;
        }
        else
        {
          picture_flag=0;
            var reader = new FileReader();
            reader.onload = function (e) 
            {
              $('#image-add').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    });

    $(document).on('click','.edit_portfolio',function()
    {
    	$("#response-msg1").empty();
		$("#response-msg1").removeClass('fail');
		$('#response-msg1').removeClass('success');
		$('.required-error').empty();
    	var edit_id=$(this).attr("name");

    	$.ajax({
			type:'post',
			url: api_url+'view_portfolio_detail.php',
			data:{id:edit_id},
			dataType:'JSON',
			      success:function(data){
			        console.log(data);
			        	$('#blog_tags').empty();
			        if(data.status==true)
        			{
				        	var id=data.response.detail.id;
				        	var created=data.response.detail.created;
				        	var title=data.response.detail.bold_title;
				        	var status=data.response.detail.status;
				        	var image=data.response.detail.image;
				        	var context=data.response.detail.context;
				  
				        	for(var j=0;j<data.response.tags.length;j++)
					        	{
					        		var tag_id=data.response.tags[j].tag_id;
					        		var tag_name=data.response.tags[j].tag_name;
					        		$('#blog_tags').append('<div class="tag-items" id="tagItems_'+tag_id+'" >'+tag_name+'<span class="close tag-hide del_tag" id="'+tag_id+'" >x</span></div>');
					        	}
					        	

				        	 $('#edit_id').val(id);
                                $('#edit_bold_title').val(title);
				        	 $("#image-add").attr("src",image_url+image);
        			}
	
			       }		

	});
    });
    $(document).on('click','.del_tag',function()
    {
    	$("#response-msg1").empty();
		$("#response-msg1").removeClass('fail');
		$('#response-msg1').removeClass('success');
		$('.required-error').empty();
    	var tag_id=$(this).attr("id");
    	// alert(tag_id);
    	$.ajax({
			type:'post',
			url: api_url+'delete_tag.php',
			data:{tag_id:tag_id},
			dataType:'JSON',
			      success:function(data){
			        console.log(data);
			       if(data.status==true)
			              {
			                $('#response-msg1').text();
			                $('#response-msg1').removeClass("fail");
			                $('#response-msg1').append(data.response);
			                $('#response-msg1').addClass("success");
			                $("#tagItems_"+tag_id).fadeOut();


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


    });
    $(document).on('click','.Disable',function()
    {
    	 $("#response-msg").empty();
$("#response-msg").removeClass('fail');
$('#response-msg').removeClass('success');
$('.required-error').empty();
    
    	var status_id=$(this).attr("name");
    	$.ajax({
			type:'post',
			url: api_url+'change_status.php',
			data:{id:status_id,status:'0'},
			dataType:'JSON',
			      success:function(data){
			        console.log(data);
			       if(data.status==true)
			              {

			                 $('#response-msg').text();
			                $('#response-msg').removeClass("fail");
			                $('#response-msg').append(data.response);
			                $('#response-msg').addClass("success");
			                $("#status_"+status_id).removeClass('btn-disable Disable'); 
			                 $("#status_"+status_id).addClass('btn-blue Active'); 
			                 $("#status_"+status_id).text('');
			                 $("#status_"+status_id).text('Active');

			                
			              }  
			              else if (data.status==false)
			              {
			                $('#response-msg').text();
			                $('#response-msg').removeClass("success");
			                $('#response-msg').append(data.response);
			                $('#response-msg').addClass("fail");
			              } 
			          }
			});

    });

    $(document).on('click','.Active',function()
    {
    	 $("#response-msg").empty();
$("#response-msg").removeClass('fail');
$('#response-msg').removeClass('success');
$('.required-error').empty();
    	var status_id=$(this).attr("name");
    	$.ajax({
			type:'post',
			url: api_url+'change_status.php',
			data:{id:status_id,status:'1'},
			dataType:'JSON',
			      success:function(data){
			        console.log(data);
			       if(data.status==true)
			              {
			                 $('#response-msg').text();
			                $('#response-msg').removeClass("fail");
			                $('#response-msg').append(data.response);
			                $('#response-msg').addClass("success");
			                 $('#status_'+status_id).removeClass('btn-blue Active'); 
			                  $('#status_'+status_id).addClass('btn-disable Disable'); 
			                 $('#status_'+status_id).text('');
			                 $('#status_'+status_id).text('Disable');
			                
			              }  
			              else if (data.status==false)
			              {
			                $('#response-msg').text();
			                $('#response-msg').removeClass("success");
			                $('#response-msg').append(data.response);
			                $('#response-msg').addClass("fail");
			              } 
			          }
			});

    });
});




$( document ).ready(function() {
 var picture_flag=0;
$(document).on('click','.update_portfolio',function(){
$("#response-msg1").empty();
$("#response-msg1").removeClass('fail');
$('#response-msg1').removeClass('success');
$('.required-error').empty();
var bold_title=$("#edit_bold_title").val();
var upload=$("#upload").prop('files')[0];
var tag=$("#edit_tags").val();
console.log(tag);
var id=$("#edit_id").val();
	if(upload=='' ||  upload=='undefined' || upload==null)
      {
       // $('#image-update').after('<div class="required-error" style="padding-left:20px;">Please Select Image</div>');
       //  $('#image-update').addClass('border-red');
      }
      else
      {
        if(picture_flag==1)
        {
           $('#image-update').after('<div class="required-error" style="padding-left:20px;">Maximum File Size should be 1MB.</div>');
        $('#image-update').addClass('border-red');
      	}
        
        else if(picture_flag==0)
        {
	        var cimg=$('#img').val();
	        var extension=cimg.split('.').pop().toLowerCase();
	        if(jQuery.inArray(extension,['png','jpg','jpeg'])==-1)
	        {
	           $('#image-update').after('<div class="required-error" style="padding-left:20px;">Invalid Extension.</div>');
             $('#image-update').addClass('border-red');        
	        }
     	}
     }
     
	if( bold_title==''  || picture_flag==1)
	{
		$('.required-error').remove();
        $('input').removeClass('border-red');        
        $('select').removeClass('border-red');        
        $('img').removeClass('border-red');
        $('textarea').removeClass('border-red');        
          if(picture_flag==1)
	        {
	          $('#image-update').after('<div class="required-error" style="padding-left:20px;">Maximium file size should be !MB..</div>');
        		$('#image-update').addClass('border-red'); 
	        }
	 
			if (bold_title==''){
				$('#edit_bold_title').after('<div class="required-error">This field should not be empty.</div>');
				$("#edit_bold_title").addClass('border-red');
			}
			
			
	 	}

	 else
	 {
	 	$('.required-error').remove();
        $('input').removeClass('border-red');
        $('select').removeClass('border-red');
        $('img').removeClass('border-red');
          $('textarea').removeClass('border-red');
	 	if(tag=="")
	 	{
	 		var form_data=new FormData();
	 	 form_data.append('id',id);
          form_data.append('bold_title',bold_title);
          form_data.append('image',upload); 
		
	 		$.ajax({
				      type:'post',
				      url:api_url+'update_portfolio.php',
				      	data: form_data,
				        contentType: false,
				        cache: false,
				        processData: false,
				      	dataType:'JSON',
				      	success:function(data){
				        console.log(data.status);
				      	if(data.status==true)
			              {
			                $('#response-msg1').text();
			                $('#response-msg1').removeClass("fail");
			                $('#response-msg1').text(data.response);
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
	 	else
	 	{
	 		var tag1=JSON.parse(tag);
			var tag_array=[];
			for(var i=0;i<tag1.length;i++)
			{
				tag_array.push(tag1[i].value);
			}
	 		var form_data=new FormData();
	 	 form_data.append('id',id);
          form_data.append('tag',JSON.stringify(tag_array));
          form_data.append('bold_title',bold_title);
          form_data.append('image',upload); 
		
	 		$.ajax({
				      type:'post',
				      url:api_url+'update_portfolio_tag.php',
				      	data: form_data,
				        contentType: false,
				        cache: false,
				        processData: false,
				      	dataType:'JSON',
				      	success:function(data){
				        console.log(data.status);
				      	if(data.status==true)
			              {
			                $('#response-msg1').text();
			                $('#response-msg1').removeClass("fail");
			                $('#response-msg1').text(data.response);
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
	 	
	 	}
	 });

  ///upload user image
    $("#upload").change(function() {
    var file = this.files[0]; 
    $('#img').val(file.name);
    if (this.files && this.files[0])
    {
        if(this.files[0].size>100000)
        {
            $('#image-update').append('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
          $('#image-update').addClass('border-red');
            picture_flag=1;
        }
        else
        {
          picture_flag=0;
            var reader = new FileReader();
            reader.onload = function (e) 
            {
              $('#image-update').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    });
});

