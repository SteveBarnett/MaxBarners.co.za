<?php
/*
Template Name: Blog
*/
?>
<?php get_header(); ?>
<?php global $woo_options; ?>

    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
        <!-- #main Starts -->
        <div id="main" class="col-left">

			<h1 class="tumblog-title"><?php _e($woo_options['woo_blog_title'], 'woothemes') ?><span class="tumblog-tagline"><?php _e($woo_options['woo_blog_tagline'], 'woothemes') ?></span></h1>     
                    
			<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("post_type=post&paged=$paged"); ?>
		
			<?php if (get_option('woo_woo_tumblog_switch') == 'true') { ?>
				<?php get_template_part( 'loop', 'tumblog' ); ?>
    		<?php } else { ?>
    			<?php get_template_part( 'loop', 'default' ); ?>
    		<?php } ?>  
                                                                    
			<?php woo_pagenav(); ?>
        </div><!-- /#main -->
            
		<?php get_sidebar(); ?>

    </div><!-- /#content -->    
		
<?php get_footer(); ?>