<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mayang-collection
 */

    $menu = mc_menu('menu-1');
    $woo_menu = mc_menu('woocommerce-menu');
    $slide = get_field( "slide_header" );
    $myaccount = get_permalink( wc_get_page_id( 'myaccount' ) );
    $shop = get_permalink( wc_get_page_id( 'shop' ) );
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="mayang-collection" />
    <meta name="author" content="mayang-collection" />
	<link rel="profile" href="https://gmpg.org/xfn/11">

    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />

    <?php if ( is_user_logged_in() ) : ?>
   <!--  	<style type="text/css">
    		#page-top {
    			margin-top: 20px;
    		}
    	</style> -->
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="page-top">
<?php wp_body_open(); ?>
<div id="page" class="site">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3 d-flex justify-content-between" id="mainNav">
            <div class="container-fluid">
  	            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
  	            	<span class="navbar-toggler-icon"></span>
  	            </button>
                <div class="collapse navbar-collapse  col-4 ml-auto my-2 my-lg-0 align-items-start">
    	    	    <ul class="navbar-nav">
    	    	    	<?php 
    	    	    		foreach ($menu as $key => $value) {
    	    	    			$a_class = "";
    	    	    			$a_href = "";
    	    	    			$a_id = "";
    	    	    			$a_attr = "";
    	    	    			$li_class = "";
    	    	    			if ( empty($value['menu_child']) ) {
    	    	    				$a_class = "js-scroll-trigger";
    	    	    				$a_href = $value['url'];
    	    	    			}
    	    	    			else {
    	    	    				$a_class = "dropdown-toggle";
    	    	    				$a_href = "#";
    	    	    				$a_id = "navbarDropdown_".$value['ID'];
    	    	    				$li_class = "dropdown";
    	    	    				$a_attr = 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
    	    	    			}
    	    	    	?>
    	    	    			<li class="nav-item <?= $li_class; ?>">
    	    	    				<a class="nav-link <?= $a_class; ?>" href="<?= $a_href; ?>" id="<?= $a_id; ?>" <?= $a_attr; ?> >
    	    	    					<?= $value['title']; ?>    	    	    						
    	    	    				</a>
    	    	    				<?php if ( !empty($value['menu_child']) ) { ?>
	    	    	    				<div class="dropdown-menu" aria-labelledby="<?= $a_id; ?>">
	    	    	    					<?php foreach ($value['menu_child'] as $k_child => $v_child) { ?>
	    	    	    							 <a class="dropdown-item" href="<?= $v_child['url']; ?>"><?= $v_child['title']; ?></a>
	    	    	    					<?php } ?>
	    	    	    				</div>
    	    	    				<?php } ?>
    	    	    			</li>
    	    	    	<?php
    	    	    		}
    	    	    	?>
                    </ul>
                </div>

                <div class="navbar-nav  col-4 justify-content-center">
                	<a class="navbar-brand js-scroll-trigger" href="#page-top">
						<img class="img-fluid img-thumbnail w-70 h-70" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo1.png">                		
                	</a>
                </div>

                <div class="col-4  d-flex justify-content-end"> 
                	<ul class="navbar-nav">
    	    	    	<?php 
    	    	    		foreach ($woo_menu as $key => $value) {
    	    	    			$a_class = "";
    	    	    			$a_href = "";
    	    	    			$a_id = "";
    	    	    			$a_attr = "";
    	    	    			$li_class = "";
    	    	    			if ( empty($value['menu_child']) ) {
    	    	    				$a_class = "js-scroll-trigger";
    	    	    				$a_href = $value['url'];
    	    	    			}
    	    	    			else {
    	    	    				$a_class = "dropdown-toggle";
    	    	    				$a_href = "#";
    	    	    				$a_id = "navbarDropdown_".$value['ID'];
    	    	    				$li_class = "dropdown";
    	    	    				$a_attr = 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
    	    	    			}
    	    	    	?>
    	    	    			<li class="nav-item <?= $li_class; ?>">
    	    	    				<a class="nav-link <?= $a_class; ?>" href="<?= $a_href; ?>" id="<?= $a_id; ?>" <?= $a_attr; ?> >
    	    	    				<?php if ( $a_href == $shop ) { ?>	
	    	    	    			<i class="fa fa-shopping-bag" id="shop-nav" aria-hidden="true"></i>
	    	    	    			<?php } 
                                          if ( $a_href == $myaccount ) { 
	    	    	    				     if (is_user_logged_in()) {
                                                echo "My Account";
                                             }
                                             else {
                                                echo $value['title'];
                                             }
    	    	    				      } 
    	    	    				 ?>   	    						
    	    	    				</a>
    	    	    				
    	    	    				<?php if ( !empty($value['menu_child']) ) { ?>
	    	    	    				<div class="dropdown-menu" aria-labelledby="<?= $a_id; ?>">
	    	    	    					<?php 
	    	    	    					foreach ($value['menu_child'] as $k_child => $v_child) { 
	    	    	    					?>
	    	    	    							<a class="dropdown-item" href="<?= $v_child['url']; ?>"><?= $v_child['title']; ?></a>
	    	    	    					<?php } ?>
	    	    	    				</div>
    	    	    				<?php } ?>
    	    	    			</li>
    	    	    	<?php
    	    	    		}
    	    	    	?>
    	    	    </ul>
                </div>
            </div>
        </nav>

        <!-- Mobile Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mobileNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger w-50" href="#page-top">
                	<img class="img-thumbnail" src="<?php echo get_template_directory_uri(); ?>/assets/img/logo1.png">
                </a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
    	    	    	<?php 
    	    	    		foreach ($menu as $key => $value) {
    	    	    			$a_class = "";
    	    	    			$a_href = "";
    	    	    			$a_id = "";
    	    	    			$a_attr = "";
    	    	    			$li_class = "";
    	    	    			if ( empty($value['menu_child']) ) {
    	    	    				$a_class = "js-scroll-trigger";
    	    	    				$a_href = $value['url'];
    	    	    			}
    	    	    			else {
    	    	    				$a_class = "dropdown-toggle";
    	    	    				$a_href = "#";
    	    	    				$a_id = "navbarDropdown_".$value['ID'];
    	    	    				$li_class = "dropdown";
    	    	    				$a_attr = 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
    	    	    			}
    	    	    	?>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li> -->
	    	    			<li class="nav-item <?= $li_class; ?>">
    	    	    				<a class="nav-link <?= $a_class; ?>" href="<?= $a_href; ?>" id="<?= $a_id; ?>" <?= $a_attr; ?> > 
    	    	    					<?= $value['title']; ?>
    	    	    				</a>
    	    	    		</li>
                    	<?php } ?>

    	    	    	<?php 
    	    	    		foreach ($woo_menu as $key => $value) {
    	    	    			$a_class = "";
    	    	    			$a_href = "";
    	    	    			$a_id = "";
    	    	    			$a_attr = "";
    	    	    			$li_class = "";
    	    	    			if ( empty($value['menu_child']) ) {
    	    	    				$a_class = "js-scroll-trigger";
    	    	    				$a_href = $value['url'];
    	    	    			}
    	    	    			else {
    	    	    				$a_class = "dropdown-toggle";
    	    	    				$a_href = "#";
    	    	    				$a_id = "navbarDropdown_".$value['ID'];
    	    	    				$li_class = "dropdown";
    	    	    				$a_attr = 'role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"';
    	    	    			}
    	    	    	?>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li> -->
	    	    			<li class="nav-item <?= $li_class; ?>">
    	    	    				<a class="nav-link <?= $a_class; ?>" href="<?= $a_href; ?>" id="<?= $a_id; ?>" <?= $a_attr; ?> > 
    	    	    					<?= $value['title']; ?>
    	    	    				</a>
    	    	    		</li>
                    	<?php } ?>

                    </ul>
                </div>
            </div>
        </nav>


        <!-- Masthead-->
        <?php if ( is_front_page() && !empty($slide) ) : ?>
        <header>
            <div id="carouselMayang" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			  	<?php 
			  	 $index_slide = 0;
			  	 foreach ($slide as $key) {
			  	 	$active = $index_slide == 0 ? 'active' : '';
			  	 	if ($key) {
			  	 ?>
			    <li data-target="#carouselMayang" data-slide-to="<?= $index_slide; ?>" class="<?= $active; ?>"></li>
				<?php 
					$index_slide++;
					}
				 }
				?>
			  </ol>
			  <div class="carousel-inner">
			  	<?php 
			  	 $index_slide2 = 0;
			  	 foreach ($slide as $key) {
			  	 	$active2 = $index_slide2 == 0 ? 'active' : '';
			  	 	if ($key) { 
			  	 		// var_dump($key['sizes']);
			  	 ?>
			    <div class="carousel-item <?= $active2; ?>">
			      <img class="d-block w-100" src="<?= $key['sizes']['1536x1536']; ?>" alt="slide_<?= $key['ID']; ?>">
			    </div>
				<?php 
					$index_slide2++;
					}
				 }
				?>
			  </div>
			  <a class="carousel-control-prev" href="#carouselMayang" role="button" data-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="carousel-control-next" href="#carouselMayang" role="button" data-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
           
        </header>
         <?php endif; ?>