<?php get_header(); ?>
		<div class="container">

			<div class="row">
				
				<div class="span8" id="main" role="main">

					<?php if (is_category()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Category:", "bonestheme"); ?> <small><?php single_cat_title(); ?></small>
							</h1>
						</header>
					
					<?php } elseif (is_tag()) { ?> 
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Tag:", "bonestheme"); ?> <small><?php single_tag_title(); ?></small>
							</h1>
						</header>
					
					<?php } elseif (is_author()) { 
						global $post;
						$author_id = $post->post_author;
					?>
						<header class="page-header">
							<h1 class="archive-title h2">	
								<?php _e("Posts By:", "bonestheme"); ?> <small><?php echo get_the_author_meta('display_name', $author_id); ?></small>
							</h1>
						</header>
					<?php } elseif (is_day()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Day:", "bonestheme"); ?> <small><?php the_time('l, F j, Y'); ?></small>
							</h1>
						</header>
		
					<?php } elseif (is_month()) { ?>
					<header class="page-header">
						<h1 class="archive-title h2">
							<?php _e("Month:", "bonestheme"); ?> <small><?php the_time('F Y'); ?></small>
						</h1>
					</header>
					
					<?php } elseif (is_year()) { ?>
						<header class="page-header">
							<h1 class="archive-title h2">
								<?php _e("Year:", "bonestheme"); ?> <small><?php the_time('Y'); ?></small>
							</h1>
						</header>
					<?php } ?>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
						
						<header class="page-header">
							
							<h3 class="h2"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
	<p class="byline vcard"><?php
	printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'bonestheme')), bones_get_the_author_posts_link(), get_the_category_list(', '));
	?></p>
						
						</header> <!-- end article header -->
					
						<section class="entry-content clearfix">
						
							<?php the_post_thumbnail( 'bones-thumb-300' ); ?>
						
							<?php the_excerpt(); ?>
					
						</section> <!-- end article section -->
						
						<footer class="article-footer">
							
						</footer> <!-- end article footer -->
					
					</article> <!-- end article -->
					
					<?php endwhile; ?>	
					
					<?php if (function_exists('bones_page_navi')) { ?>
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
						<header class="page-header">
							<h3><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h3>
						</header>
						<section class="entry-content">
							<p class="lead"><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
						</section>
					</article>
					
					<?php endif; ?>

				</div> <!-- end #main.span8 -->

				<?php get_sidebar(); ?>

			</div> <!-- end .row -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
