<?php
/**
 * Template Name: Transportation Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>

		<div id="container">
			<div id="content" role="main">

			<?php
/**
 * The loop that displays a page.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop-page.php.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.2
 */
?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php if ( is_front_page() ) { ?>
						<h2 class="entry-title"><?php the_title(); ?></h2>
					<?php } ?>
					
					<?php if ( get_post_meta($post->ID, 'bannerimage', true) ) { ?>
						<div id='msbannerimage'>
							<img class='photo' src="/scripts/timthumb.php?src=<?php echo get_post_meta($post->ID, 'bannerimage', true) ?>&w=705&h=100&q=100" alt="">
						</div>
					<?php } ?>

					<div class="entry-content">

					<div id='greybox'>
						<div id='insidegreybox'>
							<h1><?php the_title(); ?></h1>
							<?php the_content(); ?>
							<!--
							<a class='reddot' href='/who-we-are/'>Meet The Featured Employees</a>
							-->
							<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'twentyten' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'twentyten' ), '<span class="edit-link">', '</span>' ); ?>
						</div>
					</div>
					<!--
					<h2 class='brownbgrepeat'>Board of Directors</h2>
					-->


<!-- This is the old layout -->

					<?php 
					query_posts(array('showposts' => '5', 'post_parent' => '7', 'post_type' => 'page')); ?>

					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id='greybox'>
							<div id='insidegreybox'>
								<img class='photo casestudy' src="/scripts/timthumb.php?src=<?php echo get_post_meta($post->ID, 'case-photo1', true) ?>&h=113&w=215&q=100">
									<div id='totheright'>
										<div class='whatwedocontent'>
											<h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
											<?php the_excerpt(); ?>
										</div>
									</div><!--end totheright -->
							</div><!-- sindegreybox -->
						</div><!-- greybox-->
					<?php endwhile; // end of the loop. ?>

					<?php wp_reset_query();  // Restore global post data ?>

<!-- This is the end of the old layout -->

					</div><!-- .entry-content -->
				</div><!-- #post-## -->

<?php endwhile; // end of the loop. ?>
	
			</div><!-- #content -->
		</div><!-- #container -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
