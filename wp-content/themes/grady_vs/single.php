<?php
get_header();
?>
<?php
$bg_img = get_the_post_thumbnail_url($blog_post_id, 'full');
$link = get_the_permalink();

?>

    <div class="container-fluid inner_page_top_section "style="background-image:url('<?php echo get_field('bg_img'); ?>')">
        <div class="container inner_container_top_left ">
            <h1 class="title_left_main"><?php the_title(); ?></h1>
        </div></div>

        <div class="container section_single_post">
<h2><?php echo get_field('description'); ?></h2>
            <div class="single_press_bottom">
                <div class="col-date"><p><span class="text_grey pd_right">DATE:</span> <?php echo get_the_date('F n, Y / G:i A'); ?></p></div>
                <div class="col-share"><p><span class="text_grey">SHARE:</span></p>
                        <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php print $link; ?>&t=<?php the_title(); ?>"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" href="https://twitter.com/share?url=<?php  print $link;?>"><i class="fab fa-twitter"></i></a>
                        <a target="_blank" href="https://www.instagram.com/gradyvsthib/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="content_main_text"><?php the_content();?></div>
            <div class="image_content" style="background-image:url('<?php echo get_field('img_content'); ?>')"></div>
            <?php endwhile; endif; ?>
        </div>

<?php get_footer();