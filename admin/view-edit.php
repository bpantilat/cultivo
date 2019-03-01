<?php
include 'includes/header.php';
?>
<?php $id=$_GET['id'];?>

<!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">

          <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Edit Blog</h4>
            <form class="forms-sample">
              <div id="response-msg1"></div>
              <input type="hidden" id="edit_id" name="edit_id" value="<?php echo $id; ?>">
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
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
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
        <!-- content-wrapper ends -->


<?php
include 'includes/footer.php';
?>

<script src="js/view-edit.js"></script>
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