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
    <section id="Katalog-page">
    	<div class="container">
	    	<div class="card-deck mb-3 text-center">
		        <div class="card mb-4 shadow-sm">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Free</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$0 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>10 users included</li>
		              <li>2 GB of storage</li>
		              <li>Email support</li>
		              <li>Help center access</li>
		            </ul>
		            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Sign up for free</button>
		          </div>
		        </div>
		        <div class="card mb-4 shadow-sm">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Pro</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$15 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>20 users included</li>
		              <li>10 GB of storage</li>
		              <li>Priority email support</li>
		              <li>Help center access</li>
		            </ul>
		            <button type="button" class="btn btn-lg btn-block btn-primary">Get started</button>
		          </div>
		        </div>
		        <div class="card mb-4 shadow-sm">
		          <div class="card-header">
		            <h4 class="my-0 font-weight-normal">Enterprise</h4>
		          </div>
		          <div class="card-body">
		            <h1 class="card-title pricing-card-title">$29 <small class="text-muted">/ mo</small></h1>
		            <ul class="list-unstyled mt-3 mb-4">
		              <li>30 users included</li>
		              <li>15 GB of storage</li>
		              <li>Phone and email support</li>
		              <li>Help center access</li>
		            </ul>
		            <button type="button" class="btn btn-lg btn-block btn-primary">Contact us</button>
		          </div>
		        </div>
		      </div>
    	</div>

    </section>

<?php
// get_sidebar();
get_footer();
