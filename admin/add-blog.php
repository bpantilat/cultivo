<?php 
  include 'includes/header.php';
?>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<link rel="stylesheet" href="https://yaireo.github.io/tagify/dist/tagify.css">

      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Blog</h4>


                  <form class="forms-sample">
                    <div id="response-msg"></div>
                    <div class="form-group">
                      <label for="exampleInputUsername1">Context</label>
                      <input type="text" class="form-control" id="context" required="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputTitle1">Bold Title</label>
                      <textarea name="" id="bold_title" maxlength="160" minlength="160" id="" cols="30" rows="4" class="form-control" required=""></textarea>
                    </div>
                      <div class="form-group">
                      <label for="blog_text">Blog Text</label>
                      <textarea name="" id="blog_text" name="blog_text" maxlength="160" minlength="160" id="" cols="30" rows="4" class="form-control" required=""></textarea>
                    </div>
                    
                    <div class="text-right">
                      <button type="button" class="btn btn-purple btn-rounded mr-2 add">Submit</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <img src="images/images.png" id="image-content" alt="" class="img-fluid upload_image">
                  <div class="file-upload">
                    <input type="hidden" name="" id="user_img">
                      <label for="upload" class="file-upload__label">Upload Image</label>
                      <input id="upload" class="file-upload__input" type="file">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        
<?php 
  include 'includes/footer.php';
  ?>
<script src="//cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
<script>
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace( 'blog_text');
</script>
<!--  <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
  $(document).ready(function() {
    $('#blog_text').summernote();
  });
</script> -->
<script src="js/add-blog.js"></script>


