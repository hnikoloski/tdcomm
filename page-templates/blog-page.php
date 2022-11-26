<?php

/*
    * Template Name: Blog Page
    * Template Post Type: post, page, product
    */



get_header(); ?>

<?php
require(get_template_directory() . '/template-parts/hero.php');
?>
<main id="primary" class="site-main">
    <div class="content-wrapper">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC',

        );

        $query = new WP_Query($args);

        if ($query->have_posts()) {
        ?>
            <div class="blog-posts-wrapper">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                ?>
                    <div class="blog-card">
                        <a href="<?php the_permalink(); ?>">
                            <h5 class="blog-card__title"><?php the_title(); ?></h5>
                        </a>
                        <a class="blog-card__image d-block" href="<?php the_permalink(); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" alt="<?php the_title(); ?>" />
                        </a>
                        <p class="blog-card__excerpt">

                            <?php
                            $excerpt = get_the_excerpt();
                            if (strlen($excerpt) > 250) {
                                $excerpt = substr($excerpt, 0, 250) . '...';
                            }
                            echo $excerpt;
                            ?></p>
                    </div>
                <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </div><!-- .entry-content -->
</main><!-- #main -->
<?php
get_footer();
?>