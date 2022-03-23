<?php
/*
*   Template Name: Inner page
*/
?>

<?php   get_header(); ?>
    <div class="container-fluid inner_page_top_section " style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <div class="container inner_container_top_center ">
            <h1 class="title_center"><?php the_title(); ?></h1>
        </div>


    </div>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php the_content(); ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>