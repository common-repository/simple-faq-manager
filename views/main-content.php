<?php
    
    $title = ! empty( $topic_selected ) ? $topic_selected->name : 'All Topics';

?>

<h2><?php echo $title; ?></h2>

<?php if ( $questions->have_posts() ) : ?>
    
    <div class='simple_faq_accordion'>

        <?php while ( $questions->have_posts() ) : $questions->the_post(); ?>

            <!-- article -->
            <div class='simple_faq_single'>

                <h3 class='simple_faq_accordion_heading'><?php echo get_the_title(); ?> <span class="dashicons dashicons-arrow-down"></span></h3>
                <div class='simple_faq_accordion_content'><?php the_content(); ?></div>

            </div>
            <!-- /article -->

        <?php endwhile; ?>

    </div>

<?php endif; ?>