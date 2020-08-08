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
        <p class="lead">
          <i class="fa fa-clock-o" aria-hidden="true"> <?php echo get_the_date(); ?> </i> | 
          <i class="fa fa-user" aria-hidden="true"> <?php echo get_the_author(); ?> </i>
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