<?php
$args = array( 'post_type' => 'pchc_slide' );
$loop = new WP_Query( $args );
if($loop->have_posts() ) :
?>
<div id="pchcCarousel" class="carousel slide">
	<div class="carousel-inner">
		<?php while( $loop->have_posts() ) : $loop->the_post() ?>
		<?php
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'pchc-carousel-slide' );
			$url = $thumb['0'];
		?>
		<div class="item<?php echo get_previous_post() ? '' : ' active'; ?>" style="background-image: url(<?php echo $url; ?>)">
			<div class="container">
				<div class="carousel-caption">
					<h1><?php echo the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<?php endwhile; ?>
	</div>
	<a class="left carousel-control" href="#pchcCarousel" data-slide="prev">&lsaquo;</a>
	<a class="right carousel-control" href="#pchcCarousel" data-slide="next">&rsaquo;</a>
</div><!-- end #pchcCarousel -->
<style>
/* Carousel base class */
.carousel {
	margin-bottom: 60px;
}

.carousel .container {
	position: relative;
	z-index: 9;
}

.carousel-control {
	height: 80px;
	margin-top: 0;
	font-size: 120px;
	text-shadow: 0 1px 1px rgba(0,0,0,.4);
	background-color: transparent;
	border: 0;
}

.carousel .item {
	height: 500px;
	background-size: cover;
}
.carousel img {
	position: absolute;
	top: 0;
	left: 0;
	min-width: 100%;
	height: 500px;
}

.carousel-caption {
	background-color: transparent;
	position: static;
	max-width: 550px;
	padding: 0 20px;
	margin-top: 200px;
}
.carousel-caption h1,
.carousel-caption .lead {
	margin: 0;
	line-height: 1.25;
	color: #fff;
	text-shadow: 0 1px 1px rgba(0,0,0,.4);
}
.carousel-caption .btn {
	margin-top: 10px;
}

/* RESPONSIVE CSS
		-------------------------------------------------- */

@media (max-width: 979px) {

	.container.navbar-wrapper {
		margin-bottom: 0;
		width: auto;
	}
	.navbar-inner {
		border-radius: 0;
		margin: -20px 0;
	}

	.carousel .item {
		height: 500px;
	}
	.carousel img {
		width: auto;
		height: 500px;
	}

	.featurette {
		height: auto;
		padding: 0;
	}
	.featurette-image.pull-left,
	.featurette-image.pull-right {
		display: block;
		float: none;
		max-width: 40%;
		margin: 0 auto 20px;
	}
}


@media (max-width: 767px) {

	.navbar-inner {
		margin: -20px;
	}

	.carousel {
		margin-left: -20px;
		margin-right: -20px;
	}
	.carousel .container {

	}
	.carousel .item {
		height: 300px;
	}
	.carousel img {
		height: 300px;
	}
	.carousel-caption {
		width: 65%;
		padding: 0 70px;
		margin-top: 100px;
	}
	.carousel-caption h1 {
		font-size: 30px;
	}
	.carousel-caption .lead,
	.carousel-caption .btn {
		font-size: 18px;
	}

	.marketing .span4 + .span4 {
		margin-top: 40px;
	}

	.featurette-heading {
		font-size: 30px;
	}
	.featurette .lead {
		font-size: 18px;
		line-height: 1.5;
	}

}
</style>
<?php wp_reset_query();
endif; ?>