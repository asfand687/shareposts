<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="row mb-3">
  <div class="col-md-12">
    <?php echo flash('post_message'); ?>
  </div>
  <div class="col-md-6">
    <h1>Posts</h1>
  </div>
  <div class="col-md-6">
    <a href="<?php echo URLROOT . '/posts/add' ;?>" class="btn btn-primary float-right">
      <i class="fa fa-pencil-alt"></i> Add Post
    </a>
  </div>
</div>
<?php foreach($data['posts'] as $post) : ?>
  <div class="card card-body mb-3">    
    <h4 class="card-title">
      <?php echo $post->title ; ?>
    </h4>  
    <div class="bg-light p-2 mb-3">
      Written by <?php echo '<strong>' . $post->name . '</strong>';?> on <?php echo $post->postCreated ?>
    </div> 
    <p class="card-text bg-light pl-2">
      <?php echo $post->body; ?>
    </p>
    <a href="<?php echo URLROOT . '/posts/show/' . $post->postId; ?>" class="btn btn-dark">More</a>     
  </div>
<?php endforeach; ?>
<?php require APPROOT . '/views/inc/footer.php'; ?>







