
<?php
$blog_post_id =get_option('page_for_posts');
$blog_post=get_post($blog_post_id);
$bg_img = get_the_post_thumbnail_url($blog_post_id, 'full');

?>

<section class="container-fluid inner_page_top_section " style="background-image:url('<?php echo $bg_img?>')">
    <div class="container inner_container_top_left">
                <h1 class="title_left_main"><?php echo $blog_post->post_title; ?></h1>
    </div>
</section>
<?php function new_excerpt_length_2($length) {
    return 30;
}
add_filter('excerpt_length', 'new_excerpt_length_2');


global $wp_query, $paged;
$temp_query = $wp_query;
$pages=6;
$args3 = array('post_type' => 'post', 'posts_per_page' =>$pages,'order' => 'asc', 'post_status' => 'publish','paged' => $paged);
$posts1 = new WP_Query($args3);?>
    <div class="container event_blog_container">
        <div class="row">

<?php if ( $posts1->have_posts() ){ ?>
         <?php      while ( $posts1->have_posts() ) {
                    $posts1->the_post();
                $id         = get_the_ID();
                $permalink  = get_the_permalink();
                $image      = get_the_post_thumbnail_url( $id, 'full' );
                $title      = get_the_title();
                 $date1       = get_the_date('M');
             $date2       = get_the_date('n');
                 $date       = get_the_date('l, m/d/Y');
                 $time = get_the_time();
                $categories = get_the_terms( $id, 'category' );
                $cat        = $categories[0]->name;
                $excerpt    = get_the_excerpt(); ?>
                <div class="col-lg-6 col-md-6 col-12">

                    <div class="press_item">
                        <a href="<?php echo $permalink; ?>" class="press_item_img">
                            <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                        </a>
                    <div class="div_date"> <p class="time_head"><?php echo $date1;?></p>
                        <p class="time_head_bottom"><?php echo $date2 ; ?></p>
                    </div>

                        <div class="press_item_wrapper">
                            <a class="press_item_title" href="<?php echo $permalink; ?>">
                                <p class="title_card"><?php echo $title; ?></p>
                            </a>
                            <p class="date_text"><?php echo $date; ?></p>
                            <p class="time_text"><?php echo $time; ?></p>
                            <p class="press_item_excerpt"><?php echo $excerpt; ?></p>
                            <a class="home_news_btn" href="<?php echo $permalink; ?>">
                                MORE
                            </a>
                        </div>
                    </div>
                </div>
            <?php
            } ?>
        </div>
        <div class="row" id="row_posts"></div>
        <?php

        if ($posts1->max_num_pages > 1) {
        ?>
        <div class="blog_btn_bottom ">
            <a class="button btn-loadmore" href="#">
                <span class="button_label">Load More</span>
            </a>
            <script>
                var count_list=<?php print $pages;?>;
                var count_page=<?php print $posts1->max_num_pages;?>;
                var current_page=1;
                var toins='row_posts';
            </script>

        </div>
        <?php }?>
    </div>
<?php
}