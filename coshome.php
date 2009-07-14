<?php
  /*
  Template Name: COSHome
  */
?>

<?php get_header(); ?>

<?php if (have_posts()) { ?>

<div id="content">

 <?php

	$postCount = 0;
	$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
	query_posts( 'paged=$page&post_per_page=-1&cat=' . get_query_var('cat') );
	?>


           <div class="entry clearfloat">
				<?php the_content(); ?>

				<?php wp_link_pages(array(
				'before' => '<p><strong> '.__('Pages:','Mimbo').' </strong>', 
				'after' => '</p>', 
				'next_or_number' => 'number')); 
				?>

			</div>

			
		
		<div id="more-posts">
		
		<?php
                  while (have_posts()) {
                    the_post();	
		      if($postcount <= 3 ) { 
		      //GETS NEXT FOUR EXCERPTS
		?>
		        <div class="clearfloat recent-excerpts">
                          <h4>
                            <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                          </h4>
                          <p class="date"><?php the_time('F j, Y'); ?> &bull; </p>
			  <?php the_content(); ?>
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
  <ul class="headlines"><?php echo join("\n        ", $links); ?></ul>
	<?php endif; ?>
	</div><!--END RECENT/OLDER POSTS-->
	
</div><!--END CONTENT-->

<?php get_sidebar(); ?>
<?php get_footer(); ?>

