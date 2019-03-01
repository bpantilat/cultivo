$( document ).ready(function() {
var picture_flag=0;
	const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];

var edit_id=$('#edit_id').val();
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

    	$("#response-msg1").empty();
$("#response-msg1").removeClass('fail');
$('#response-msg1').removeClass('success');
$('.required-error').empty();
    	$.ajax({
			type:'post',
			url: api_url+'view_blog_detail.php',
			data:{id:edit_id},
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
				        	// console.log('created:'+created);
				        	// d = new Date(created);
							// var month = d.getMonth() + 1;
							// var date = d.getDate();
							// var year = d.getFullYear();
							// var date1=month + '/' + date + '/' + year;

							// console.log('date'+date);
							// console.log('time'+time);
				        	 $('#edit_id').val(id);
				              $('#edit_context').val(context);
                                $('#edit_bold_title').val(title);
                                 CKEDITOR.instances['edit_blog_text'].setData(blog_text);
				        	 $("#image-update").attr("src",image_url+image);
				        	 
				        	  // console.log(date1);
				        	
        			}
	
			       }		

	});
  



 var picture_flag=0;
$(document).on('click','.update_blog',function(){
$("#response-msg1").empty();
$("#response-msg1").removeClass('fail');
$('#response-msg1').removeClass('success');
$('.required-error').empty();
var context=$("#edit_context").val();
var bold_title=$("#edit_bold_title").val();
var blog_text=CKEDITOR.instances['edit_blog_text'].getData();
var upload=$("#upload").prop('files')[0];
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
     
	if(context=='' || bold_title==''  || blog_text==''   || picture_flag==1)
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
	 
			if (context=='') {
			 	$('#edit_context').after('<div class="required-error">This field should not be empty.</div>');
				$("#edit_context").addClass('border-red');
				}
			if (bold_title==''){
				$('#edit_bold_title').after('<div class="required-error">This field should not be empty.</div>');
				$("#edit_bold_title").addClass('border-red');
			}
			if (blog_text==''){
				$('#edit_blog_text').after('<div class="required-error">This field should not be empty.</div>');
				$("#edit_blog_text").addClass('border-red');
			}
			
			
	 	}

	 else
	 {
	 	$('.required-error').remove();
        $('input').removeClass('border-red');
        $('select').removeClass('border-red');
        $('img').removeClass('border-red');
          $('textarea').removeClass('border-red');
	 	
	 	var form_data=new FormData();
	 	 form_data.append('id',id);
          form_data.append('context',context);
          form_data.append('bold_title',bold_title);
            form_data.append('blog_text',blog_text);
          form_data.append('image',upload); 
		
	 		$.ajax({
				      type:'post',
				      url:api_url+'update_blog.php',
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
	 });  
});


