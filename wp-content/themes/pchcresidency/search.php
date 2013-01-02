<?php get_header(); ?>
		<div class="container">

			<div class="row">
				
				<div class="span8" id="main" role="main">

					<header class="page-header">

					<h1 class="archive-title"><?php _e('Search:', 'bonestheme'); ?> <small><?php echo esc_attr(get_search_query()); ?></small></h1>
					</header>

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
						<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
							<header class="page-header">

								<h3 class="search-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
								<p class="byline vcard"><?php
                printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(__('F jS, Y', 'bonestheme')), bones_get_the_author_posts_link(), get_the_category_list(', '));
              ?></p>
					
							</header> <!-- end article header -->
				
							<section class="entry-content">
							    <?php the_excerpt('<span class="read-more">' . __('Read more &raquo;', 'bonestheme') . '</span>'); ?>
				
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
					    		<h3><?php _e("Sorry, No Results.", "bonestheme"); ?></h3>
					    	</header>
					    	<section class="entry-content">
					    		<p class="lead"><?php _e("Try your search again.", "bonestheme"); ?></p>
					    	</section>
					    </article>
				
				    <?php endif; ?>

				</div> <!-- end #main.span8 -->

				<?php get_sidebar(); ?>

			</div> <!-- end .row -->

		</div> <!-- end .container -->

<?php get_footer(); ?>
