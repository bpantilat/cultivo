// Uplaod Image From home page

function preview(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) { $('#upload').attr('src', e.target.result);  }
    reader.readAsDataURL(input.files[0]);     }   }

//$("#upload").change(function(){
  //$("#upload").css({top: 0, left: 0});
    //preview(this);
    //$("#upload").draggable({ containment: 'parent',scroll: false });
//});
