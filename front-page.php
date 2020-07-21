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
$args = array(
	'post_status' => 'published',
);
$products = wc_get_products( $args );
?>
    <!-- Subscribe-->
    <section class="page-section" id="subscribe">
        <div class="container">
        	<div class="d-flex justify-content-center">
        		<img class="img-fluid" src="http://localhost:8080/mayang/wp-content/uploads/2020/07/subsrcibe.png">
        	</div>
        	<div class="container" id="container-subscribe">
		       <form>
				  <div class="form-row align-items-center">
				    <div class="col-md-9 my-1">
				      <label class="sr-only" for="inlineFormInputName">Name</label>
				      <input type="text" class="form-control" id="subscribe-form" placeholder="Enter Yout Email Address">
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
    		<div class="row">
    			<?php foreach ($menu_katalog as $key => $value) {?>
    			<div class="col-md-6">
				  <div class="card img-fluid" style="width:500px">
				    <img class="card-img-top" src="<?= $value['gambar']['url']; ?>" alt="Card image" style="width:100%">
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
	    		<?php } ?>
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
    				<a href="">
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


    <div id="portfolio">
        <div class="container-fluid p-0">
            <div class="row no-gutters">
                <div class="col-lg-4 col-sm-6">
                    <a class="portfolio-box" href="assets/img/portfolio/fullsize/1.jpg">
                        <img class="img-fluid" src="assets/img/portfolio/thumbnails/1.jpg" alt="" />
                        <div class="portfolio-box-caption">
                            <div class="project-category text-white-50">Category</div>
                            <div class="project-name">Project Name</div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>

<?php
// get_sidebar();
get_footer();
