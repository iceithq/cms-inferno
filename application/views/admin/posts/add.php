<h3>New post</h3>
<?php echo form_open('posts/add'); ?>
<p>Title<br>
  <?php echo form_input('title', post('title'), 'id="title" class="form-control"'); ?>
  <?php echo form_error('title'); ?>
</p>
<p>Teaser<br>
  <?php echo form_textarea('teaser', post('teaser'), 'class="form-control teaser"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>Content<br>
  <?php echo form_textarea('content', post('content'), 'id="content" class="form-control content"'); ?>
  <?php echo form_error('content'); ?>
</p>
<p>Created<br>
  <?php echo form_input('created_at', now(), 'id="created_at" class="form-control"'); ?>
  <?php echo form_error('created_at'); ?>
</p>
<p>
  <?php echo form_submit('submit', 'Save  post', 'id="save" class="btn btn-success"'); ?>
  or
  <?php echo anchor('posts', 'cancel'); ?>
</p>
<?php echo form_close(); ?>

<script>
  $(document).ready(function() {
    $('.teaser').summernote({
      height: 200
    });
    $('.content').summernote({
      height: 600
    });
  });
</script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>