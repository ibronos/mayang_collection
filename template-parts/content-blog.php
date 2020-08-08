<?php
$img_url = get_the_post_thumbnail_url(get_the_ID(),'large');
$video_url = get_field("url_video");

$img = '';
if ( !empty($img_url) ) {
  $img = $img_url;
} else {
  $img = 'http://placehold.it/700x300';
}
?>

  <div class="row">
    <div class="col-md-7">
      <a href="#">
        <img class="img-fluid rounded mb-3 mb-md-0" src="<?= $img; ?>" alt="">
      </a>
    </div>
    <div class="col-md-5">
      <h3><?php the_title(); ?></h3>
      <p>
          <?php echo wp_trim_words( get_the_content(), 100, '...' ); ?>
      </p>
      <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read More</a>
    </div>
  </div>

  <hr>