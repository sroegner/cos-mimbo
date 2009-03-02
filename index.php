<?php get_header(); ?>

<?php if (have_posts()) { ?>

<div id="content">

 <?php
	$postCount = 0;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts( 'paged=$page&post_per_page=-1&cat=' . get_query_var('cat') );
	while (have_posts()) { the_post(); 
		if( $postcount == 0 ) { 
		//GETS LATEST OR STICKY POST
	?>
	        
    <div id="lead" class="clearfloat">
      <div id="lead-text">
	    <h2>Welcome!</h2>
        
        <p>This website is intended as a window into the community that is Church of Our Saviour.
		   You will find information about our services and programs, about our activities for children,
		   and our efforts to reach out to others.
		   Beyond that you will read stories of our life together as a spiritual community that tells you a bit about who we are.</p>
		<p>What makes us really want to be here, however, lies beyond these pages in the warmth and care of the people who make this their church.
		   We hope you will join us on Sunday morning at 10 AM (childcare provided), and consider making Church of Our Saviour your spiritual home.</p>
	  </div>
    </div>
			
		<!--END LEAD/STICKY POST-->
			
		
		<div id="more-posts">
		<h3><?php _e('Recent Posts','Mimbo'); ?></h3>
		
		<?php
		}
		elseif( $postcount > 0 && $postcount <= 4 ) { 
		//GETS NEXT FOUR EXCERPTS
		?>
			
		<div class="clearfloat recent-excerpts">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
<?php echo get_post_image (get_the_id(), '', '', '' .get_bloginfo('template_url') .'/scripts/timthumb.php?zc=1&amp;w=105&amp;h=85&amp;src='); ?></a>

<h4><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a> </h4>

<p class="date"><?php the_time('n/d/y'); ?> &bull; </p>
			<?php the_excerpt(); ?>
		</div>
						
<?php //GETS NEXT HEADLINES
		}
		else { 
			ob_start();
			echo '<li><a href="'; 
			the_permalink();
			echo '">';
			the_title();
			echo '</a></li>';
			$links[] = ob_get_contents();
			ob_end_clean();			
		}
		$postcount ++;
		}
	}
	else {
?>

<?php } ?>
	
	
<?php 
	if(count($links)): ?>

	 <h3><?php _e('Older Posts','Mimbo'); ?></h3>
	 <ul class="headlines"><?php echo join("\n", $links); ?></ul>
			
	<?php endif; ?>
	</div><!--END RECENT/OLDER POSTS-->
	
    
    
	
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
