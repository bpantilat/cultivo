$( document ).ready(function() {
 var picture_flag=0;

$(document).on('click','.add',function(){
$("#response-msg").empty();
$("#response-msg").removeClass('fail');
$('#response-msg').removeClass('success');
$('.required-error').empty();

var tag=$("#tag").val();
console.log(tag);
var tag1=JSON.parse(tag);
var tag_array=[];
for(var i=0;i<tag1.length;i++)
{
	tag_array.push(tag1[i].value);
}
console.log(tag_array);
var bold_title=$("#bold_title").val();
var type="portfolio";
var status="1";
var upload=$("#upload").prop('files')[0];
	  if(upload=='' ||  upload=='undefined' || upload==null)
      {
       $('#image-add').after('<div class="required-error" style="padding-left:20px;">Please Select Image</div>');
        $('#image-add').addClass('border-red');
      }
      else
      {
        if(picture_flag==1)
        {
          $('#image-add').after('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
          $('#image-add').addClass('border-red');
        }
        else if(picture_flag==0)
        {
	        var cimg=$('#user_img').val();
	        var extension=cimg.split('.').pop().toLowerCase();
	        if(jQuery.inArray(extension,['png','jpg','jpeg'])==-1)
	        {
	         $('#image-add').after('<div class="required-error" style="padding-left:20px;">Invalid Image</div>');  
	         $('#image-add').addClass('border-red');     
	         return false; 
	        }
     	}
      }


	if(tag=='[]' || bold_title=='' || picture_flag==1 ||  upload=='undefined' || upload==null || upload==" ")
	{

		$('.required-error').remove();
        $('input').css({"border":""});
        $('select').css({"border":""});
        $('img').css({"border":""});
          if(picture_flag==1)
	        {
	          $('#image-add').after('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
	          $('#image-add').addClass('border-red');
	        }
	 
			if (tag=='[]') {
			 	$('#tag').after('<div class="required-error">This field should not be empty.</div>');
				$('.tagify').addClass('border-red');
				}
			if (bold_title==''){
				$('#bold_title').after('<div class="required-error">This field should not be empty.</div>');
				$("#bold_title").addClass('border-red');
			}
			if (upload=='' ||  upload=='undefined' || upload==null) {
				$('#upload').after('<div class="required-error">This field should not be empty.</div>');
				$("#upload").addClass('border-red');
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
          form_data.append('tag',JSON.stringify(tag_array));
          form_data.append('bold_title',bold_title);
          form_data.append('type', type);
          form_data.append('status', status);
          form_data.append('image',upload); 
	 		$.ajax({
				      type:'post',
				      url:api_url+'add_portfolio.php',
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
			                $('#response-msg').text(data.response);
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
            $('#image-add').after('<div class="required-error" style="padding-left:20px;">Maximum File Size is 1MB.</div>');
          $("#image-add").addClass('border-red');
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
});