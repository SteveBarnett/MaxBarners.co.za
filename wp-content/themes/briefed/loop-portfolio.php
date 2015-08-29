<?php global $woo_options,$portfolio_exclude; ?>
<div id="portfolio" class="masonry">
    	
    <?php if ( $woo_options['woo_portfolio_panel_headers'] == 'true' ) { ?><h1 class="portfolio-title"><?php _e($woo_options['woo_portfolio_title'], 'woothemes') ?><span class="portfolio-tagline"><?php _e($woo_options['woo_portfolio_tagline'], 'woothemes') ?></span></h1><?php } ?>
    <?php do_action('wp_dribbble'); ?>
    <?php $portfolio = get_posts( array( 'post_type' => 'portfolio', 'numberposts' => $woo_options['woo_portfolio_number'], 'exclude' => $portfolio_exclude ) ); ?>  
	<?php if (!empty($portfolio)) : $count = 0; ?>
	<ol class="portfolio dribbbles">
	<?php foreach($portfolio as $post) : setup_postdata($post); $count++; ?>
	    <li class="group">
	    	<div class="dribbble">
	    		<div class="dribbble-shot">
	    			<div class="portfolio-img dribbble-img">
	    				<a href="<?php the_permalink(); ?>" class="dribbble-link"><?php woo_image('key=portfolio-image&width=200&link=img'); ?></a>
	    				<a href="<?php the_permalink(); ?>" class="dribbble-over"><?php the_title(); ?></a><br/>
	    					<span><?php the_time( get_option( 'date_format' ) ); ?></span> 
	    			</div>
	    		</div>
	    	</div>
	    </li>
	<?php if ($count == 4): ?><div class="fix"></div><?php $count = 0; endif; ?>
	<?php endforeach; endif; ?>
	</ol>
		
</div><!-- /#portfolio -->