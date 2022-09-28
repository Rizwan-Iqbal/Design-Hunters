<?php 
    /**
    * Sample template tag function for outputting a cmb2 file_list
    *
    * @param  string  $file_list_meta_key The field meta key. ('wiki_test_file_list')
    * @param  string  $img_size           Size of image to show
    */ 
?>
<!-- Portfolio Detail Start -->
<div class="container">
    <div id="content">
    <!-- Portfolio Detail Start -->
    <div class="rs-porfolio-details"> 
        <?php while ( have_posts() ) : the_post();
            $post_client        = get_post_meta( get_the_ID(), 'client', true );
            $post_location      = get_post_meta( get_the_ID(), 'location', true );
            $post_surface_area  = get_post_meta( get_the_ID(), 'surface_area', true );
            $post_created       = get_post_meta( get_the_ID(), 'created', true );
            $post_date          = get_post_meta( get_the_ID(), 'date', true );
            $post_project_value = get_post_meta( get_the_ID(), 'project_value', true );
            

            //item lebel

            $post_client_level        = get_post_meta( get_the_ID(), 'client_name', true );
            $post_location_level      = get_post_meta( get_the_ID(), 'location_name', true );
            $post_surface_area_level  = get_post_meta( get_the_ID(), 'surface_area_title', true );
            $post_date_level          = get_post_meta( get_the_ID(), 'created_title', true );
            $post_project_value_level = get_post_meta( get_the_ID(), 'complete_title', true );
            $post_created_level       = get_post_meta( get_the_ID(), 'project_value_title', true );

        ?>
           
        <div class="row">
            <div class="col-lg-8">
                
                <div class="project-desc">
                    <?php  if(has_post_thumbnail()){ ?>
                          <div class="project-img"><?php the_post_thumbnail(); ?></div>
                       <?php  } ?>
                   <?php the_content();?>
                </div>                
            </div>
            <div class="col-lg-4">
                <?php

                    if($post_created || $post_date || $post_client || $post_location || $post_surface_area || $post_project_value){ ?>
                        <div class="ps-informations">
                             <h3 class="info-title"><?php esc_html_e('Project Info','braintech');?></h3>                    
                                    <ul>
                                  <?php  $terms = get_the_terms($post->ID, 'portfolio-category');
                                  if(!empty( $terms )): ?>
                                  <li>

                                      <span><?php esc_html_e('Category:', 'braintech');?></span>
                                      <?php 
                                          if ( is_singular('portfolios') ) {
                                              $terms = get_the_terms($post->ID, 'portfolio-category');

                                              foreach ($terms as $term) {
                                                  $term_link = get_term_link($term, 'portfolio-category');
                                                  if (is_wp_error($term_link))
                                                      continue;
                                                  echo esc_html($term->name) ;
                                              }
                                          }
                                      ?>
                                  </li><?php endif; ?>
                                  <?php if($post_client){?>
                                  <li>

                              <span>
                                  <?php if(!empty( $post_client_level )){
                                       echo esc_html($post_client_level);
                                  }else{
                                      esc_html_e('Client:','braintech');
                                  } ?> 
                              </span>
                               <?php   echo esc_html($post_client); ?>
                          </li>
                        <?php }?>

                         <?php if($post_location){?>
                          <li>
                              <span>
                                   <?php if(!empty( $post_location_level )){
                                       echo esc_html($post_location_level);
                                  }else{
                                     esc_html_e('Location:','braintech');
                                  } ?> </span>
                              <?php echo esc_html($post_location); ?>
                          </li>
                        <?php }?>


                          <?php if($post_surface_area){?>
                         <li><span> <?php if(!empty( $post_surface_area_level )){
                                       echo esc_html($post_surface_area_level);
                                  }else{
                                      esc_html_e('Manager:','braintech');
                                  } ?> </span>
                          <?php echo esc_html($post_surface_area); ?></li>
                        <?php }?>

                         <?php if($post_created){?>
                        <li><span> <?php if(!empty( $post_date_level )){
                                       echo esc_html($post_date_level);
                                  }else{
                                      esc_html_e('Designer:','braintech');
                                  } ?></span>
                          <?php echo esc_html($post_created); ?></li>
                        <?php }?>

                        
                        <?php if($post_date){?>
                          <li>
                              <span> <?php if(!empty( $ $post_created_level )){
                                       echo esc_html($post_created_level);
                                  }else{
                                      esc_html_e('Completed Date:','braintech');
                                  } ?> </span>
                              <?php   echo esc_html($post_date); ?>
                          </li>
                        <?php }?>
                        
                        <?php if($post_project_value){?>
                        <li><span> <?php if(!empty( $post_project_value_level )){
                                       echo esc_html($post_project_value_level);
                                  }else{
                                      esc_html_e('Project Value:','braintech');
                                  } ?> </span>
                          <?php  echo esc_html($post_project_value); ?></li>
                        <?php }?>         
                        </ul>          
                    
                </div>

                <?php } ?>
                <div class="information-sidebar">
                    <?php dynamic_sidebar('project-1'); ?>
                </div>                
            </div>
        </div>

      <?php endwhile;
        wp_reset_postdata();
      ?>   
       
      </div>
    </div>
</div>

<!-- Portfolio Detail End -->