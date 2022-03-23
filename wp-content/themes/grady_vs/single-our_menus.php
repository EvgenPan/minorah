<?php get_header();
?>
<?php
$now_id=get_the_ID();
?>
<section class="menus_section">
    <div class="container-fluid inner_page_top_section " style="background-image:url('<?php echo get_the_post_thumbnail_url(); ?>')">
        <div class="container inner_container_top_rigt ">
       <h2>Our Menus</h2>
        </div>
    </div>
    <div class="container">
<div class="row">
<div class="col-lg-4 col-md-12 col-12 item_menus" style="background-image: url(<?php echo get_field('bg_menus');?>)">

<?php global $wp_query;
    $temp_query = $wp_query;
    $args1 = array('post_type' => 'our_menus','posts_per_page' => -1,'post_status'=>'publish',  'orderby'=>'menu_order','order'=>'asc');
    $posts = new WP_Query( $args1 );
    if ( $posts->have_posts() ) {
	print '<ul class="all_menus">';
        while ($posts->have_posts()) {
            $posts->the_post();
			$class='';
			if (get_the_ID() == $now_id)  $class=' active ';
			print '<li class="'.$class.'"><a href="' . get_the_permalink() . '" >'.get_the_title().'</a></li>';

        }
        print '</ul>';
    }
wp_reset_postdata();
    $wp_query = NULL;
    $wp_query = $temp_query;
?>
</div>
<div class="col-lg-8 col-md-12 col-12 menus_content">

<h1><?php the_title();?></h1>


<div class="menus_top">
    <div class="top_content">
       <div class="top_content_row">
           <?php if(get_field('image_logo_left_item') == true){?>
               <img src="<?php echo get_field('image_logo_left_item');?>" alt="logo-image">
          <?php } ?>

        <h3 style="color: <?php echo get_field('select_color_tittle_top_menu'); ?>"><?php echo get_field('title_top_menu');?></h3></div>

        <p class="description_top_content"><?php echo get_field('subtitle_top_menu');?></p>
    </div>



       <div class="list_menus_top_content">

           <?php  $fd_content = get_field('food_content');
           if (is_array($fd_content)) {?>
            <ul class="list_food">
               <?php foreach ($fd_content as $key => $value) { ?>

                   <li class="list_food-item">
                       <div class="img_wrapp">
                           <?php if(get_field('image_arrow') == true){?>
                               <img src="<?php echo get_field('image_arrow');?>" alt="logo-image">
                          <?php } ?>

                           <h3 style="color:<?php echo $value['select_color_food'];?>"><?php echo $value['food_name_title'];?></h3>
                           </div>
                   <p><?php echo $value['food_name_description'];?></p>
                   </li>
               <?php } ?>

            </ul>
      <?php  }
            ?>
</div>
</div>
<div class="menu_center">
    <div class="center_content">

        <div class="top_content_row"><img src="<?php echo get_field('image_logo_left');?>" alt="logo-image">
            <h3 style="color: <?php echo get_field('select_title_menu_list'); ?>"><?php echo get_field('title_menu_list');?></h3></div>
        <p class="description_top_content"><?php echo get_field('title_menu_list_descr');?></p>
    </div>
        <?php  $fmenu_list = get_field('menu_list');
        if (is_array($fmenu_list)) {?>
           <div class="list_food_div">
            <ul class="list_food">
                <?php foreach ($fmenu_list as $key => $value) { ?>
                    <li class="list_food-item">
                        <div class="top_content_row">
                        <?php if($value['image_logo_left'] == true){?>
                            <img src="<?php echo $value['image_logo_left'];?>" alt="logo-image">
                        <?php } ?>
                        <h3 style="color: <?php echo $value['select_title_list']; ?>" ><?php echo $value['title_list'];?></h3>
                        </div>
                        <p><?php echo $value['description_menu'];?></p>
                    </li>
                <?php } ?>

            </ul>
           </div>
        <?php  }
        ?>


    </div>


    <div class="menu_bottom">
        <h3><?php echo get_field('title_dress');?></h3>
<div class="dress_content">
    <div class="dress_content_border">
    <h4><?php echo get_field('add_ons_title');?></h4>

        <?php  $add_ons = get_field('add_ons');
        if (is_array($add_ons)) {?>
            <ul class="list_food">
                <?php foreach ($add_ons as $key => $value) { ?>
                    <li class="list_food-item">
                        <p><?php echo $value['add-ons_subtitle'];?></p>
                        <p><?php echo $value['small__entree'];?></p>
                    </li>
                <?php } ?>

            </ul>
        <?php  }
        ?>
    </div>
</div>
        <div class="dress_content_homemade">
            <h4><?php echo get_field('chefs_homemade_title');?></h4>

            <?php  $chefs_homemade = get_field('chefs_homemade');
            if (is_array($chefs_homemade)) {?>
                <ul class="list_food">
                    <?php foreach ($chefs_homemade as $key => $value) { ?>
                        <li class="list_food-item">
                            <p><?php echo $value['chefs_homemade_subt_left'];?></p>
                            <p><?php echo $value['chefs_homemade_subt_right'];?></p>
                        </li>

                    <?php } ?>

                </ul>
            <?php  }
            ?>
        </div>

    </div>

</div>


</div>
        <div class="menus_bottom_ch-favorites">

            <div class="top_content_row_favorites">
<?php if(get_field('image') == true){?>
    <img src="<?php echo get_field('image');?>" alt="logo-image">
    <?php } ?>
               
                <h4><?php echo get_field('name_chefs_favirite');?></h4></div>
            <p class="content_ch-favorites"><?php echo get_field('text_content');?></p>
        </div>
</div>


</section>
<?php get_footer(); ?>