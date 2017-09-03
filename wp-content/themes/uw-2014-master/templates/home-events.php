<?php
/**
 * Template Name: home-events
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
    <link rel='stylesheet' id='uw-master-css'  href='http://localhost/hub/wp-content/themes/uw-2014-master/events.css?ver=3.6' type='text/css' media='all' />
    <link href="//www.washington.edu/static/home/wp-content/themes/boundless/style.css?ec3099f" id="homepage-css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="http://localhost/hub/wp-content/plugins/slick/slick.css"/>
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<script type="text/javascript" src="http://localhost/hub/wp-content/plugins/slick/slick.min.js"></script>
<!-- // Add the new slick-theme.css if you want the default styling -->
<!-- <link rel="stylesheet" type="text/css" href="http://localhost/hub/wp-content/plugins/slick/slick-theme.css"/> -->
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


<!-- 
      <div id='main_content' class="uw-body-copy" tabindex="-1"> -->

        <?php
          // Start the Loop.
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
  $(document).ready(function() {
    //feed to parse
    
    //feed for the entire hub
    //http://hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d
    var feed = "//hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d";

    $.ajax(feed, {
        accepts:{
            xml:"application/rss+xml"
        },
        dataType:"xml",
        success:function(data) {
            

            $(data).find("item").each(function () { 
                var feedInst = $(this);
                  eventItem = {
                    // item:       feedInst.find("item").text(),
                    eTitle:       feedInst.find("title").text().slice(0,10),
                    eLink:        feedInst.find("link").text(),
                    eLoc: feedInst.find("mc\\:location, location").text(),
                    eDate: feedInst.find("mc\\:EventDate, EventDate").text(),
                    eStart: feedInst.find("mc\\:StartTime, StartTime").text(),
                    eEnd: feedInst.find("mc\\:EndTime, EndTime").text(),                
                  }
                //   eventItem.eTitle.slice
                  var eTitleHTML = '<div id="eventTitle" class="eventSlideTitle col-md-8">' + eventItem.eTitle + '</div>';
                  
                  var months = [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", 
                                "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ];
                  var dateParse = eventItem.eDate.split("/");
                  var eMonth = months[dateParse[0]-1];
                  var eDay = dateParse[1];
                  var eYear = dateParse[2];
                //   var eDateHTML = '<div class="eventDayBox col-md-4"> <div class="eventMonth">' + eMonth + '</div><div class="eventDay">' + eDay + '</div></div>';
                //   console.log(eMonth, eDay, eYear);
                //   var eLocHTML = '<div class="eventLoc col-md-8">' + eventItem.eLoc + '</div>';
                //   var eTimeHTML = '<div class="eventTime col-md-8">' + eventItem.eStart + ' - ' + eventItem.eEnd + '</div>';
                //   var slideFull = '<div class="eventFull">' + eTitleHTML + eDateHTML + eLocHTML + eTimeHTML + '</div>';
                    var eDateHTML = '<div class="eventDayBox col-md-4"><div class="eventDay">' + eDay + '</div><div class="eventMonth">' + eMonth + '</div></div>';
                  console.log(eMonth, eDay, eYear);
                  var eLocHTML = '<div class="eventLoc col-md-8">' + eventItem.eLoc + '</div>';
                  var eTimeHTML = '<div class="eventTime col-md-8">' + eventItem.eStart + ' - ' + eventItem.eEnd + '</div>';
                  var slideFull = '<div class="eventFull">' + eDateHTML + eTitleHTML + eLocHTML + eTimeHTML + '</div>';
                    $("#eSlide").append(slideFull);

            });

            
            $('#eSlide').slick('unslick'); /* ONLY remove the classes and handlers added on initialize */
            $('#eSlide').slick({
                arrows: true,
                infinite: false,
          slidesToShow: 3,
          slidesToScroll: 3
          });
     
        }   
    });

    $('#eSlide').slick({
        arrows: true,
        infinite: true,
  slidesToShow: 3,
  slidesToScroll: 3
  });
    
});




</script>
<script src="//www.washington.edu/static/home/wp-content/themes/boundless/js/homepage.js?ec3099f" type="text/javascript"></script>
<?php get_footer(); ?>
<!-- <a title="Slide title" href="#"><img title="Image title" src="http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/Video-2-1024x678.jpg" alt="Image title" /></a><div><h3><a title="Slide title" href="#">APM Summer Staff Event</a></h3><p>Lorem ipsum.</p></div> -->