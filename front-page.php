<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mayang-collection
 */

get_header();
$menu_katalog = get_field('menu_katalog');
$product_args = array(
	'post_status' => 'publish',
    'posts_per_page' => 4, 
    'order' => 'DESC', 
);
$products = wc_get_products( $product_args );

$args = array(  
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 4, 
    'order' => 'DESC', 
);
$loop = new WP_Query( $args ); 


?>
    <!-- Subscribe-->
    <section class="page-section" id="subscribe">
        <div class="container">
        	<div class="d-flex justify-content-center">
        		<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/assets/img/subsrcibe.png">
        	</div>
        	<div class="container" id="container-subscribe">
		       <form>
				  <div class="form-row align-items-center">
				    <div class="col-md-9 my-1">
				      <label class="sr-only" for="inlineFormInputName">Name</label>
				      <input type="email" class="form-control" id="subscribe-form" placeholder="Enter Your Email Address">
				    </div>
				    <div class="col-auto my-1">
				      <button type="submit" class="btn btn-primary">Subscribe</button>
				    </div>
				  </div>
				</form>
				<div class="d-flex justify-content-center mt-3">
					<p>Get Email from Us and Never Another Exciting Offer</p>
				</div>
        	</div>
        </div>
    </section>

    <!-- Katalog Page -->
    <section id="katalog-page">
    	<div class="container">
    		<div class="row" style="margin-left: 30px; margin-right: 30px;">
    			<?php foreach ($menu_katalog as $key => $value) { 
    				if( !empty($value['gambar']) ) {
    				// var_dump($value['gambar']);
    			?>
    			<div class="col-md-6 pb-4 d-flex justify-content-center">
				  <div class="card img-fluid" style="width:500px">
				    <img class="card-img-top" src="<?= $value['gambar']['sizes']['medium_large']; ?>" alt="Card image" style="width:100%">
				    <div class="card-img-overlay">
					    <div class="d-flex align-items-start flex-column" style="height: 200px;">
					    	<?php if($value['link']) { ?>
							<div class="p-3" style="margin-top: 45%;">
								<a href="<?= $value['link']; ?>" class="">
									<span class="card-title"><?= $value['judul_link']; ?></span>
								</a>
							</div>
							<?php } ?>
						</div>    
				    </div>
				  </div>    				
    			</div>
	    		<?php 
			    		} 
			    	} 
			    ?>
    		</div>
    	</div>
    </section>

    <section id="carousel-katalog">
    	<div class="container">
    		<div class="row">
    			<?php foreach($products as $key => $value) { 
    				$data = $value->get_data();
    				$image_id = $value->get_image_id();
    				$image_url = wp_get_attachment_url($image_id, 'small');
    			?>
    			<div class="col-md-3">
    				<a href="<?= $value->get_permalink(); ?>">
					  <div class="card img-fluid" style="width:500px">
					    <img class="card-img-top" src="<?= $image_url; ?>" alt="Card image" style="width:100%">
					    <div class="card-footer text-center">
					    	<?php echo $value->get_title(); ?>		
					    </div>
					  </div> 
					</a>
    			</div>
    		<?php } ?>
    		</div>
		</div>
    </section>


    <div id="home-post">
    	<div class="container d-flex justify-content-center">
    		<div class="d-flex align-items-center">
    			<h3>Blogs</h3>
    		</div>
    	</div>
        <div class="container-fluid p-0">
            <div class="row no-gutters" style="background-color: var(--info);">
            	<?php
        		$x = 1; 
            	while ( $loop->have_posts() ) {
            		$loop->the_post(); 
    				$img_url = !empty( get_the_post_thumbnail_url( get_the_ID(), '500x375_size' ) ) ? 
    				get_the_post_thumbnail_url( get_the_ID(), '500x375_size' ) : 'http://placehold.it/337x225';

    				if ($x == 1 || $x == 2) {    				
			    ?>
			   		<div class="col-md-6" id="home-post-col">
			   			<a href="<?php the_permalink(); ?>">
				   			<div class="row no-gutters">
				                <div class="col-lg-6 col-sm-6">
			                        <img class="img-fluid" src="<?= $img_url; ?>" alt="<?php the_title(); ?>" />
				                </div>
				                <div class="col-lg-6 col-sm-6 d-flex justify-content-center align-self-center">
			                        	<h5 class="title"><?php the_title(); ?></h5>
				                </div>
				   			</div>
			   			</a>

			   		</div>
			  
	            <?php
	            	}
	            	if ($x == 3 || $x == 4) {
	            ?>
	            	<div class="col-md-6" id="home-post-col">
	            		<a href="<?php the_permalink(); ?>">
		            		<div class="row no-gutters">
				                <div class="col-lg-6 col-sm-6 d-flex justify-content-center align-self-center">
			                        	<h5 class="title"><?php the_title(); ?></h5>
				                </div>
				                <div class="col-lg-6 col-sm-6">
			                        <img class="img-fluid" src="<?= $img_url; ?>" alt="<?php the_title(); ?>" />
				                </div>
		            		</div>
		            	</a>
	            	</div>

	            <?php
	            	}
	            	if ($x == 4) {
	            		$x = 1;
	            	} else {
	            		$x++; 
	            	}
	        	}
	        	?>
            </div>
        </div>
    </div>

<?php
// get_sidebar();
get_footer();
