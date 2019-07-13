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
<div class="card card-body mb-3">
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <?php
        if(!isset($_GET['page']) or $_GET['page'] == 0){
          echo '<li class="page-item disabled"><a href="#" class="page-link"><<</a></li>';
        } else {
          $prevPage = $data['page_num'] - 1;
          echo '<li class="page-item"><a href="?page='.$prevPage.'" class="page-link"><<</a></li>';
        }
        $pageText = 0;
        for($page=$data['page_num'];$page<$data['num_of_pages'];$page++){
          $pageText = $page + 1;
          if(isset($_GET['page']) and $_GET['page'] == $page){
            echo '<li class="page-item active"><a class="page-link" href="?page='.$page.'">'.$pageText.'</a></li>';
          } else {
            echo '<li class="page-item"><a class="page-link" href="?page='.$page.'">'.$pageText.'</a></li>';
          }
        }
        $nxtPage = $data['page_num'] + 1;
        if((isset($_GET['page'])) and ($_GET['page'] == ($data['num_of_pages'] - 1))){
          echo '<li class="page-item disabled"><a class="page-link" href="?page='.$data['page_num'].'">>></a></li>';
        } else {
          echo '<li class="page-item"><a class="page-link disabled" href="?page='.$nxtPage.'">>></a></li>';
        }
      ?>
    </ul>
  </nav>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>









