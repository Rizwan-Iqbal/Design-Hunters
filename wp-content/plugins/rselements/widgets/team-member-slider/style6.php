
	<?php //******************//
    $cat = $settings['team_category'];
  
 

    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

	if(empty($cat)){
    	$best_wp = new wp_Query(array(
			'post_type'      => 'teams',
			'posts_per_page' => $settings['per_page'],
			'orderby' => 'menu_order',
			'order' 			=> $settings['pre_posts_sort'],
			'paged'          => $paged					
		));	  
    }   
    else{
    	$best_wp = new wp_Query(array(
				'post_type'      => 'teams',
				'posts_per_page' => $settings['per_page'],
				'paged'          => $paged,
				'orderby' => 'menu_order',
				'order' 			=> $settings['pre_posts_sort'],
				'tax_query'      => array(
			        array(
						'taxonomy' => 'team-category',
						'field'    => 'slug', //can be set to ID
						'terms'    => $cat //if field is ID you can reference by cat/term number
			        ),
			    )
		));	  
    }

	while($best_wp->have_posts()): $best_wp->the_post();

	    $designation  = !empty(get_post_meta( get_the_ID(), 'designation', true )) ? get_post_meta( get_the_ID(), 'designation', true ):'';	
?>

<div class="team-item">
	<div class="team-item-wrap">
		<div class="team-inner-wrap">
			<div class="image-wrap">
				<?php if('disable' == $settings['team_link_condition']){?>				
					<?php the_post_thumbnail($settings['thumbnail_size']); ?>				
				<?php } else {?>
					<a class="pointer-events" href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail($settings['thumbnail_size']); ?>
					</a>
				<?php } ?>
			</div>	
			<div class="team-content">
				<div class="member-desc">
					<?php if('disable' == $settings['team_link_condition']){?>
					    <h3 class="team-name">
					    	<?php the_title();?>
					    </h3>	
					<?php } else {?>
					    <h3 class="team-name">
					    	<a class="pointer-events" href="<?php the_permalink(); ?>"><?php the_title();?></a>
					    </h3>
					<?php } ?>
					<span class="team-title"><?php echo esc_html( $designation );?></span>
				</div>		
			</div>					
  		</div>
  	</div>
</div>

<?php	
	endwhile;
wp_reset_query(); 
