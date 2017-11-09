<?php
/**
 * Template Name: maps
 */
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" class="no-js">
    <head>
    
        <title> <?php wp_title(' | ',TRUE,'right'); bloginfo('name'); ?> </title>
        <meta charset="utf-8">
        <meta name="description" content="<?php bloginfo('description', 'display'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <?php wp_head(); ?>

        <!--[if lt IE 9]>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/html5shiv.js" type="text/javascript"></script>
            <script src="<?php bloginfo("template_directory"); ?>/assets/ie/js/respond.js" type="text/javascript"></script>
            <link rel='stylesheet' href='<?php bloginfo("template_directory"); ?>/assets/ie/css/ie.css' type='text/css' media='all' />
        <![endif]-->

        <?php
        echo get_post_meta( get_the_ID() , 'javascript' , 'true' );
        echo get_post_meta( get_the_ID() , 'css' , 'true' );
        ?>
    <link rel='stylesheet' id='uw-master-css'  href='../wp-content/themes/uw-2014-master/maps.css?ver=3.6' type='text/css' media='all' />
    <link href="//www.washington.edu/static/home/wp-content/themes/boundless/style.css?ec3099f" id="homepage-css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../wp-content/plugins/slick/slick.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script type="text/javascript" src="../wp-content/plugins/slick/slick.min.js"></script>
<script type="text/javascript" src="../wp-content/jquery.imagemapster.js"></script>
<script type="text/javascript" src="../wp-content/themes/uw-2014-master/templates/hubMap.js"></script>

<!-- <script type="text/javascript" src="../wp-content/jquery.rwdImageMaps.js"></script> -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    </head>
    <!--[if lt IE 9]> <body <?php body_class('lt-ie9'); ?>> <![endif]-->
    <!--[if gt IE 8]><!-->
    <body <?php body_class(); ?> >
    <!--<![endif]-->



    <!-- <a role="main" id="main-content" href="#main_content" class='screen-reader-shortcut'>Skip to main content</a> -->



    <?php get_template_part('thinstrip'); ?>

    <?php require( get_template_directory() . '/inc/template-functions.php' );
          uw_dropdowns(); ?>




    <?php get_template_part('thinstrip-no-sidebar'); ?>
      <?php get_template_part( 'menu', 'mobile' ); ?>

     <?php remove_filter ('the_content',  'wpautop'); ?>
<!-- 
      <div id='main_content' class="uw-body-copy" tabindex="-1"> -->

        <?php
          // Start the Loop.
          remove_filter( 'the_content', 'wpautop' );
          remove_filter( 'the_excerpt', 'wpautop' );
          while ( have_posts() ) : the_post();

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */
             the_content();

          endwhile;
        ?>



<!-- </div> -->

<script>
  
</script>
<script src="//www.washington.edu/static/home/wp-content/themes/boundless/js/homepage.js?ec3099f" type="text/javascript"></script>
<?php get_footer(); ?>