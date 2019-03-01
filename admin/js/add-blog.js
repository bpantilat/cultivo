$( document ).ready(function() {
 var picture_flag=0;
$(document).on('click','.add',function(){
$("#response-msg").empty();
$("#response-msg").removeClass('fail');
$('#response-msg').removeClass('success');
$('.required-error').empty();
var context=$("#context").val();
var bold_title=$("#bold_title").val();
var blog_text=CKEDITOR.instances['blog_text'].getData();
var type="blog";
var status="1";
var date=$("#date").val();
var upload=$("#upload").prop('files')[0];
	  if(upload=='' ||  upload=='undefined' || upload==null)
      {

       $('#image-content').after('<div class="required-error" style="padding-left:20px;">Please Select Image</div>');
        $('#image-content').addClass('border-red');
      }
      else
      {
        if(picture_flag==1)
        {
          $('#image-content').after('<div class="required-error" style="padding-left:20px;">Maximum File Size should be 1MB.</div>');
          $('#image-content').addClass('border-red');
        }
        else if(picture_flag==0)
        {
	        var cimg=$('#user_img').val();
	        var extension=cimg.split('.').pop().toLowerCase();
	        if(jQuery.inArray(extension,['png','jpg','jpeg'])==-1)
	        {
	         $('#image-content').after('<div class="required-error" style="padding-left:20px;">Invalid Image</div>');  
	         $('#image-content').addClass('border-red');      
	         return false;
	        }
     	}
      }
	if(context==''  || blog_text==''  || bold_title=='' || date=='' || upload==" " ||  upload=='undefined' || upload==null || picture_flag==1)
	{

		
        $('input').css({"border":""});
        $('select').css({"border":""});
        $('img').css({"border":""});

          if(picture_flag==1)
	        {
	          $('#image-content').after('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
	          $('#image-content').addClass('border-red');
	        }

	 
			if (context=='') {
			 	$('#context').after('<div class="required-error">This field should not be empty.</div>');
				$("#context").addClass('border-red');
				}
			if (bold_title==''){
				$('#bold_title').after('<div class="required-error">This field should not be empty.</div>');
				$("#bold_title").addClass('border-red');
			}
			if (blog_text=='')
			{
				$('#cke_blog_text').after('<div class="required-error">This field should not be empty.</div>');
				$("#cke_blog_text").addClass('border-red');
			}
			if (upload==" " ||  upload=='undefined' || upload==null) {
				$('#content').after('<div class="required-error">This field should not be empty.</div>');
				$("#content").addClass('border-red');
			}
			if (date=='') {
				$('#date').after('<div class="required-error">This field should not be empty.</div>');
				$("#date").addClass('border-red');
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
          form_data.append('context',context);
          form_data.append('bold_title',bold_title);
          form_data.append('blog_text',blog_text);
          form_data.append('type', type);
          form_data.append('status', status);
          form_data.append('date',date); 
          form_data.append('image',upload); 
	 		$.ajax({
				      type:'post',
				      url:api_url+'add_blog.php',
				      	data: form_data,
				        contentType: false,
				        cache: false,
				        processData: false,
				      	dataType:'JSON',
				      	success:function(data){
				        console.log(data.status);
				      	if(data.status==true)
			              {
			                $('#response-msg').text();
			                $('#response-msg').removeClass("fail");
			                $('#response-msg').append(data.response);
			                $('#response-msg').addClass("success");
			                
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
	 	}
	 });

///upload user image
$("#upload").change(function() {
    var file = this.files[0]; 
    $('#user_img').val(file.name);
    if (this.files && this.files[0])
    {
        if(this.files[0].size>100000)
        {
          $('#image-content').after('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
          $('#image-content').css({"border":"red solid 1px"});
            picture_flag=1;
        }
        else
        {
          picture_flag=0;
            var reader = new FileReader();
            reader.onload = function (e) 
            {
              $('#image-content').attr('src',e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    }
    });
});