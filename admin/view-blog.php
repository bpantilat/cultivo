<?php 
  include 'includes/header.php';
?>
<style type="text/css">
  .cke_dialog
{
    z-index: 10055 !important;
}
</style>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">

                  <h4 class="card-title">View Blog</h4>
                  <!-- items -->
                  <div id="response-msg"></div>
                  <div id="view_blog">
                    <!-- <div class="inline-content" >
                      
                      <div class="col-md-3">
                        <div class="right-info">
                          <img src="images/blog/img-01.jpg" alt="" class="img-fluid">
                        </div>
                      </div>
                      <div class="col-md-7 pl-0">
                        <div class="left-info">
                          <small class="sm-title">Considerations of Context</small>
                          <h2 class="lg-title">Capitalize on low hanging fruit to identify a ballpark case.</h2>
                          <h5 class="cal">October 30</h5>
                        </div>
                      </div>
                      <div class="col-md-2 text-left button-group">
                        <button class="btn btn-green btn-block btn-rounded" data-toggle="modal" data-target="#editModal">Edit</button>
                        <button class="btn btn-blue btn-block btn-rounded" data-toggle="confirmation" data-title="Are you Sure Active?">Active</button>
                      </div>
                      
                    </div> -->
                  </div>
                  <!-- //items -->
                  <!-- items -->
                 <!--  <div class="inline-content">
                    
                    <div class="col-md-3">
                      <div class="right-info">
                        <img src="images/blog/img-01.jpg" alt="" class="img-fluid">
                      </div>
                    </div>
                    <div class="col-md-7 pl-0">
                      <div class="left-info">
                        <small class="sm-title">Considerations of Context</small>
                        <h2 class="lg-title">Capitalize on low hanging fruit to identify a ballpark case.</h2>
                        <h5 class="cal">October 30</h5>
                      </div>
                    </div>
                    <div class="col-md-2 text-left button-group">
                      <button class="btn btn-green btn-block btn-rounded" data-toggle="modal" data-target="#editModal">Edit</button>
                      <button class="btn btn-disable btn-block btn-rounded" data-toggle="confirmation" data-title="Are you Sure Disable?">Disable</button>
                    </div>
                    
                  </div>
 -->                  <!-- //items -->



                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
<?php 
  include 'includes/footer.php';
?>

<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog edit_dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div id="response-msg1"></div>
        <div class="row">
          <div class="col-md-8">
          <form class="forms-sample">
            <input type="hidden" id="edit_id" name="edit_id">
            <input type="hidden" id="img" name="img">
            <div class="form-group">
              <label for="exampleInputUsername1">Context</label>
              <input type="text" class="form-control" id="edit_context" required="">
            </div>
            <div class="form-group">
              <label for="exampleInputTitle1">Bold Title</label>
              <textarea name="" id="edit_bold_title" maxlength="160" minlength="160" id="" cols="30" rows="4" class="form-control" required=""></textarea>
            </div>
            <div class="form-group">
              <label for="edit_blog_text">Blog Text</label>
              <textarea name="edit_blog_text" id="edit_blog_text" maxlength="160" minlength="160" id="" cols="30" rows="4" class="form-control" required=""></textarea>
            </div>
            <div class="text-left">
              <button type="button" class="btn btn-purple btn-rounded mr-2 update_blog">Submit</button>
            </div>
          </form>
        </div>
        <div class="col-md-4">
          <div class="card-body text-center">
            <img src="images/images.png" id="image-update" alt="" class="img-fluid upload_image">
            <div class="file-upload">
              <input type="hidden" name="" id="user_img">
                <label for="upload" class="file-upload__label">Upload Image</label>
                <input id="upload" class="file-upload__input" type="file" name="file-upload">
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="js/view-blog.js"></script>
  <!--  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
  $(document).ready(function() {
    $('#edit_blog_text').summernote();
  });
</script> -->
<script src="//cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'edit_blog_text');
     

</script>

</script>
<!-- <script>
  // $('[data-toggle=confirmation]').confirmation({
  //   rootSelector: '[data-toggle=confirmation]',
  //   // other options
  // });
</script> -->

<!-- Button trigger modal -->

<!-- Modal -->



  