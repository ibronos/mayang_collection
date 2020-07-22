<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mayang-collection
 */

$frontpage_id = get_option( 'page_on_front' );
$info = get_field("info", $frontpage_id);
$soc_med = get_field("social_media", $frontpage_id);

?>

        <footer class="">
        	<div class="bg-light py-5">
	            <div class="container">
					<div class="row">
				          <div class="col-12 col-md">
				            <!-- <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24"> -->
				            <small class="d-block mb-3 text-muted">Copyright © 2020 - Mayang Collection</small>
				          </div>
				          <div class="col-6 col-md">
				            <h5>Features</h5>
				            <ul class="list-unstyled text-small">
				              <li><a class="text-muted" href="#">Cool stuff</a></li>
				              <li><a class="text-muted" href="#">Random feature</a></li>
				              <li><a class="text-muted" href="#">Team feature</a></li>
				              <li><a class="text-muted" href="#">Stuff for developers</a></li>
				              <li><a class="text-muted" href="#">Another one</a></li>
				              <li><a class="text-muted" href="#">Last time</a></li>
				            </ul>
				          </div>
				          <div class="col-6 col-md">
				            <h5>About Us</h5>
				            <ul class="list-unstyled text-small">
				            	<?php
				            		if( !empty($info['alamat']) ) {
				            	?>
					              <li>
					              	<p class="text-muted">
						              	<i class="fa fa-building-o" aria-hidden="true"> <?= $info['alamat']; ?></i>
					              	</p> 
					              </li>
				              	<?php } 
				              		if( !empty($info['no_telp']) ) {
				              	?>
					              <li>
					              	<p class="text-muted">
						              	<i class="fa fa-phone" aria-hidden="true">  <?= $info['no_telp']; ?></i>
						            </p>
					              </li>
				              	<?php 
				              		}
				              		if( !empty($info['email']) ) { 
				              	?>
				              	  <li>
				              	  	<p class="text-muted">
						              	<i class="fa fa-envelope" aria-hidden="true">  <?= $info['email']; ?></i>
						            </p>
					              </li>
				              <?php } ?>

					   
				            </ul>
				          </div>
				          <div class="col-6 col-md">
				            <h5>Social Media</h5>
				            <ul class="list-unstyled text-small">
					              <li>
					              	<ul class="list-inline">
	   			              		 <?php if( !empty($soc_med['facebook']) ) {  ?>
									  <li class="list-inline-item">
									  	<a class="text-muted" href="<?= $soc_med['facebook']; ?>"><i class="fa fa-facebook" aria-hidden="true"></i> </a>
									  </li>
									  <?php } ?>

									  <?php if( !empty($soc_med['twitter']) ) {  ?>
									  <li class="list-inline-item">
									  	<a class="text-muted" href="<?= $soc_med['twitter']; ?>"><i class="fa fa-twitter" aria-hidden="true"></i> </a>
									  </li>
									   <?php } ?>

   									  <?php if( !empty($soc_med['instagram']) ) {  ?>
									  <li class="list-inline-item">
									  	<a class="text-muted" href="<?= $soc_med['instagram']; ?>"><i class="fa fa-instagram" aria-hidden="true"></i> </a>
									  </li>
									   <?php } ?>

  									  <?php if( !empty($soc_med['youtube']) ) {  ?>
									  <li class="list-inline-item">
									  	<a class="text-muted" href="<?= $soc_med['youtube']; ?>"><i class="fa fa-youtube" aria-hidden="true"></i> </a>
									  </li>
									   <?php } ?>
									</ul>
					              </li>
				            </ul>

				            <h5>Akun</h5>
				            <ul class="list-unstyled text-small">
					              <li><a class="text-muted" href="">Register</a></li>
  					              <li><a class="text-muted" href="">Login</a></li>
					        </ul>

					        <a class="btn btn-primary" href="">Contact</a>
				          </div>
					</div>
	            </div>
        	</div>

        	    <div class="container">
	            	<div class="small text-center text-muted">Copyright © 2020 - Start Bootstrap</div>
	            </div>
        </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
