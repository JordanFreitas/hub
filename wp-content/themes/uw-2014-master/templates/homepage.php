<?php
/**
  * Template Name: Home
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

    </head>
    <!--[if lt IE 9]> <body <?php body_class('lt-ie9'); ?>> <![endif]-->
    <!--[if gt IE 8]><!-->
    
    <body <?php body_class(); ?> >
    <!--<![endif]-->

 



        <?php
          // Start the Loop.
          while ( have_posts() ) : the_post(); 

            /*
             * Include the post format-specific template for the content. If you want to
             * use this in a child theme, then include a file called called content-___.php
             * (where ___ is the post format) and that will be used instead.
             */

              the_content();

            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) {
              comments_template();
            }

          endwhile;
          
        ?>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDSjDgV_-XDhkm-WOaObh4m_O1sZs-Iz70&callback=initMap" ></script>
<script>
$(window).scroll(function(){
    $(".top-vid").css("opacity", 1 - $(window).scrollTop() / 250);
    $(".selectionHome").css("opacity", 1 - $(window).scrollTop() / 250);
  $(".homeHours").css("opacity", 1 - $(window).scrollTop() / 250);
  });


//   $('#home1').hover(function(){
//     $('#homeSelect1').css("display","inline")
// });
// $('#home2').hover(function(){
//     $('#homeSelect2').css("display","inline")
// });
// $('#home3').hover(function(){
//     $('#homeSelect3').css("display","inline")
// });
function initMap() {
       map = new google.maps.Map(document.getElementById('map'), {
          center: {lat:47.655498, lng:-122.305189},
          zoom: 14
        });

     var iconBase = 'https://furtaev.ru/preview/car_parking_map_pointer_small.png';







    var marker = new google.maps.Marker({
    position: new google.maps.LatLng(47.655498, -122.305189),
    map: map,
    title: 'Husky Union Building',
    animation: google.maps.Animation.DROP
  });
     var parkingMarker = new google.maps.Marker({
    position: new google.maps.LatLng(47.660474, -122.308831),
    map: map,
    title: 'Padelford Parking Garage',
    animation: google.maps.Animation.DROP,
    icon: iconBase
  });

  47.660474, -122.308831
  marker.setMap(map);

   marker.addListener('click', function() {
    infowindow.open(map, marker);
  });

  }
</script> 

<?php get_footer(); ?>
