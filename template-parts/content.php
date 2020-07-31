<?php 

$img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
$video_url = get_field("url_video");
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <!-- Title -->
    <div style="margin-top: 5%;">
        <div class="jumbotron bg-info">
            <div class="d-flex justify-content-center">
                <h3 class="text-white"><?php the_title(); ?></h3>
            </div>
            
        </div><!-- .entry-header -->
    </div>

    <div class="container">
        <!-- Author -->
        <p class="lead">
          <a href="#"><?php mc_posted_by(); ?></a>
          <!-- Date/Time -->
          <p><?php mc_posted_on(); ?></p>
        </p>

        <hr>

        <!-- Preview Image -->
        <?php if( !empty( $video_url ) ) { ?>
        <div class="d-flex justify-content-center">
            <?= $video_url; ?>       
        </div>
        <hr>
        <?php 
            } 
              else { 
                if( !empty( $img_url ) ) {
        ?>
            <div class="d-flex justify-content-center">
                <img class="img-fluid rounded" src="<?= $img_url; ?>" alt="">        
            </div>
            <hr>
        <?php } } ?>

        <!-- Post Content -->
        <?php the_content(); ?>

        <hr>
    </div>
</article>