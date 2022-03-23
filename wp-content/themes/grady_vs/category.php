<?php
get_header();

$blog_post_id =get_option('page_for_posts');
$blog_post=get_post($blog_post_id);
$bg_img = get_the_post_thumbnail_url($blog_post_id, 'full');
$text=get_field('text',$blog_post_id);
?>

    <section class="inner_page_top_section_xs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $blog_post->post_title; ?></h1>
                    <p><?php echo $text; ?></p>
                </div>
            </div>
        </div>
    </section>
    <section id="main-event" class="inner_page_top_section" style="background:url(<?php echo $bg_img; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1><?php echo $blog_post->post_title; ?></h1>
                    <p><?php echo $text; ?></p>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <ul class="blog_link">
            <?php
$cat = get_term_by('name', single_cat_title('',false), 'category');

$args = array('taxonomy' => 'category','hide_empty' => false,'orderby'=>'name','order'=>'asc');
$terms = get_terms( $args );
print '<li  ><a href="'.get_the_permalink($blog_post_id).'">'.__('All','themename').'</a>';
foreach ($terms as $termses) :
    if ($termses->slug!='uncategorized') {
        print '<li '.(($termses->term_id==$cat->term_id) ? 'class="active"' : '').'><a href="'.get_term_link($termses->term_id).'">'.$termses->name.'</a>';
    }

endforeach;

?>
    </ul>
    </div>

<div class="container content_blog">
    <div class="row row_all_news">
        <div class="col-12">
            <div class="row news_block">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();

                        $id         = get_the_ID();
                        $permalink  = get_the_permalink();
                        $image      = get_the_post_thumbnail_url( $id, 'full' );
                        $title      = get_the_title();
                        $date       = get_the_date();
                        $categories = get_the_terms( $id, 'category' );
                        $cat        = $categories[0]->name;
                        $excerpt    = get_the_excerpt( $id ); ?>
                        <div class="col-lg-4 col-md-6">
                            <div class="press_item">
                                <a href="<?php echo $permalink; ?>" class="press_item_img">
                                    <img src="<?php echo $image; ?>" alt="<?php echo $title; ?>">
                                </a>
                                <div class="press_item_wrapper">
                                    <span class="press_item_date"><?php echo $date; ?></span>
                                    <a class="press_item_title" href="<?php echo $permalink; ?>">
                                        <h4><?php echo $title; ?></h4>
                                    </a>
                                    <p class="press_item_excerpt"><?php echo $excerpt; ?></p>

                                </div>
                            </div>
                        </div>
                    <?php
                    endwhile;
                endif;
                ?>
            </div>
            <div class="row"><div class="col-md-12 press_pagination">
                    <?php
                    the_posts_pagination( array(
                        'prev_text'          => '<i class="fal fa-angle-left"></i>',
                        'next_text'          => '<i class="fal fa-angle-right"></i>',
                        'before_page_number' => '',
                        'screen_reader_text' =>''
                    ) );

                    ?>
                </div></div>
        </div>
    </div>
    <?php

get_footer();