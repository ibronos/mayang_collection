<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mayang-collection
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> >
	
	<div class="mt-4">
		<div class="jumbotron bg-info">
			<div class="d-flex justify-content-center">
				<h3 class="text-white"><?php the_title(); ?></h3>
			</div>
			
		</div><!-- .entry-header -->
	</div>


	<div class="container mt-2">
		<?php mc_post_thumbnail(); ?>

		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'mc' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->

		<?php //if ( get_edit_post_link() ) : ?>
			<footer class="entry-footer">
				<?php
				// edit_post_link(
				// 	sprintf(
				// 		wp_kses(
							
				// 			__( 'Edit <span class="screen-reader-text">%s</span>', 'mc' ),
				// 			array(
				// 				'span' => array(
				// 					'class' => array(),
				// 				),
				// 			)
				// 		),
				// 		wp_kses_post( get_the_title() )
				// 	),
				// 	'<span class="edit-link">',
				// 	'</span>'
				// );
				?>
			</footer><!-- .entry-footer -->
		<?php //endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
