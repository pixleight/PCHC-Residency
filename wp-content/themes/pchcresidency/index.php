<?php get_header(); ?>
		<div class="container">

			<div class="row">
				<div class="span8" id="main" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

						<header class="page-header">

							<?php
							if( has_post_thumbnail() ) :
								$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pchc-resident-photo' );
								?>
								<img src="<?php echo $thumbnail['0']; ?>" class="pull-right img-polaroid img-rounded pchc-resident-photo">
							<?php endif; ?>
							
							<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						</header> <!-- end article header -->

						<section class="entry-content clearfix">
							<?php the_content(); ?>
						</section> <!-- end article section -->

						<footer class="article-footer">
							<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
						</footer> <!-- end article footer -->

						<?php // comments_template(); // uncomment if you want to use them ?>

					</article>

					<?php endwhile; ?>

					<?php if ( function_exists('bones_page_navi') ) { ?>
						<?php bones_page_navi(); ?>
					<?php } else { ?>
						<nav class="wp-prev-next">
							<ul class="clearfix">
								<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
								<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
							</ul>
						</nav>
					<?php } ?>

					<?php else : ?>

					<article id="post-not-found" class="hentry clearfix">
						<header class="article-header">
							<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
						</header>
						<section class="entry-content">
							<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
						</section>
						<footer class="article-footer">
							<p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
						</footer>
					</article>

					<?php endif; ?>

				</div> <!-- end #main.span8 -->

				<?php get_sidebar(); ?>

			</div> <!-- end .row -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
