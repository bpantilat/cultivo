var api_url='http://arksols.com/cultivo/api/';
var image_url='http://arksols.com/cultivo/uploads/';
function clearallerror()
{
	$('.error').empty();
	$('input').removeClass('error');
  $('div').removeClass('error');
  $('#response-msg').removeClass('fail');
  $('#response-msg').removeClass('success');
  $('.required-error').empty();
	$('select').removeClass('error');
	$('input').removeClass('border-red');
	$('select').removeClass('border-red');
}
function clearallinputs()
{
	$('.error').empty();
	$('input').empty();
}

function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test( $email );
}

var delay = (function(){
  var timer = 0;
  return function(callback, ms){
    clearTimeout (timer);
    timer = setTimeout(callback, ms);
  };
})();






