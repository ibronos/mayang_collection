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
$myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );

?>


<div id="mySidenav" class="sidenav closeSideNav">
  <a href="javascript:void(0)" class="closebtn" id="closeNav">&times;</a>
  <div class="container">
  		  <div class="card">
  	<div class="card-header">
  		Keranjang Belanja Anda
  	</div>
  	<div class="card-body">
  		  <a href="#">About</a>
		  <a href="#">Services</a>
		  <a href="#">Clients</a>
		  <a href="#">Contact</a>
  	</div>
  	<div class="card-footer">
  		<a href="" class="btn btn-info">Pembayaran</a>
  	</div>
  </div>
  </div>
</div>



	  <!-- The Cart Modal -->
	  <div class="modal" id="cartModal">
	    <div class="modal-dialog">
	      <div class="modal-content">
	      
	        <!-- Modal Header -->
	        <div class="modal-header">
	          <h4 class="modal-title">Modal Heading</h4>
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	        </div>
	        
	        <!-- Modal body -->
	        <div class="modal-body">
	          Modal body..
	        </div>
	        
	        <!-- Modal footer -->
	        <div class="modal-footer">
	          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
	        </div>
	        
	      </div>
	    </div>
	  </div>

    <footer>
    	<div class="bg-light py-5">
            <div class="container">
				<div class="row">
			          <div class="col-12 col-md">
			            <!-- <img class="mb-2" src="../../assets/brand/bootstrap-solid.svg" alt="" width="24" height="24"> -->
			            <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo1.png">
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
			            	<?php 
	            		     if (is_user_logged_in()) {
                             ?>
                             <li><a class="text-muted" href="<?= $myaccount; ?>">My Account</a></li>
                             <?php
                             }
                             else {
                             ?>
					              <li><a class="text-muted" href="<?= $myaccount; ?>">Register</a></li>
					              <li><a class="text-muted" href="<?= $myaccount; ?>">Login</a></li>
                             <?php
                             }
			            	?>

				        </ul>

				        <a class="btn btn-primary" href="tel:<?= $info['no_telp']; ?>">Contact</a>
			          </div>
				</div>
            </div>
    	</div>

	    <div class="container mt-3 pb-3">
			<div class="row pb-1">
				<div class="col-2"><h6 class="text-muted">Metode Pembayaran</h6></div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/bca.png"> </div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/mandiri.png"> </div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/mastercard.png"> </div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/visa.gif"> </div>
			</div>
			<div class="row">
				<div class="col-2"><h6 class="text-muted">Kurir</h6></div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/rcl.png"> </div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/jne.jpg"> </div>
				<div class="col-1"> <img class="img-fluid w-100" src="<?php echo get_template_directory_uri(); ?>/assets/img/sicepat.png"> </div>
			</div>
        </div>

    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
