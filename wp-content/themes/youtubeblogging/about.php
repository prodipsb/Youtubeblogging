<?php
   /*
    * Template Name:About us
    */
?>

<?php get_header(); ?>
<div id="page">
	<div class="content">
		<article class="article">
			<div id="content_box" >
				<div id="content" class="hfeed">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('g post'); ?>>
						<div class="single_page">
							<header>
								<h1 class="title"><?php the_title(); ?></h1>
							</header>
							<div class="post-content box mark-links">
								<?php the_content(); ?>
								<?php wp_link_pages('before=<div class="pagination">&after=</div>'); ?>
							</div><!--.post-content box mark-links-->
						</div>
						</div>
						<?php comments_template( '', true ); ?>
					<?php endwhile; ?>
				</div>
			</div>
		</article>
            <div class="">
                <div class="widget widget-sidebar contact">
                    <h3 class="widget-title">Follow Us On Social Media</h3>
                    <ul>
                        <li><a href=""><img src="<?php echo get_template_directory_uri() .'/images/facebook.png';?>" style="width: 60px; height: 60px;"></a></li>
                        <li><a href=""><img src="<?php echo get_template_directory_uri() .'/images/twitter-icon.png';?>" style="width: 60px; height: 60px;"></a></li>
                        <li><a href=""><img src="<?php echo get_template_directory_uri() . '/images/youtube1.png' ;?>" style="width: 60px; height: 60px;"></a></li>
                        <li><a href=""><img src="<?php echo get_template_directory_uri() . '/images/googleplus.png';?>" style="width: 60px; height: 60px;"></a></li>
                    </ul>
                </div>
            </div>
	</div>
</div>
<?php get_footer(); ?>