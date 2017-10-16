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
    <link rel='stylesheet' id='uw-master-css'  href='../wp-content/themes/uw-2014-master/events.css?ver=3.6' type='text/css' media='all' />
    <link href="//www.washington.edu/static/home/wp-content/themes/boundless/style.css?ec3099f" id="homepage-css" media="all" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="../wp-content/plugins/slick/slick.css"/>
    <link href="http://addtocalendar.com/atc/1.5/atc-style-blue.css" rel="stylesheet" type="text/css">
    <!-- <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script> -->
<!-- <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script> -->
<script type="text/javascript" src="../wp-content/plugins/slick/slick.min.js"></script>
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
                    eTitle:       feedInst.find("title").text(),
                    eLink:        feedInst.find("link").text(),
                    eLoc: feedInst.find("mc\\:location, location").text(),
                    eDate: feedInst.find("mc\\:EventDate, EventDate").text(),
                    eStart: feedInst.find("mc\\:StartTime, StartTime").text(),
                    eEnd: feedInst.find("mc\\:EndTime, EndTime").text(),                
                  }
                //   eventItem.eTitle.slice
                  var eTitleHTML = '<div id="eventTitle" class="eventSlideTitle col-md-8">' + eventItem.eTitle.slice(0,25) + '</div>';
                  
                  var months = [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", 
                                "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ];
                  var dateParse = eventItem.eDate.split("/");
                  var eMonthVal = dateParse[0]-1;
                  var eMonth = months[dateParse[0]-1];
                  var eDay = dateParse[1];
                  var eYear = dateParse[2];
                  //Start Time Format
                  var startTime24 =  eventItem.eStart.split(":");
                  var startHour = parseInt(startTime24[0]);
                  var startMin = startTime24[1].split(" ");
                  startMin = startMin[0];
                  if(eventItem.eStart.slice(-2) == "PM" && startTime24[0] < 12) startHour += 12;
                  if(eventItem.eStart.slice(-2) == "AM" && startTime24[0] == 12) startHour -= 12;
                  startTime24 = startHour + ':' + startMin + ':00';
                  console.log(startTime24);
                  //End Time Format
                  var endTime24 =  eventItem.eEnd.split(":");
                  var endHour = parseInt(endTime24[0]);
                  var endMin = endTime24[1].split(" ");
                  endMin = endMin[0];
                  if(eventItem.eEnd.slice(-2) == "PM" && endTime24[0] < 12) endHour += 12;
                  if(eventItem.eEnd.slice(-2) == "AM" && endTime24[0] == 12) endHour -= 12;
                  endTime24 = endHour + ':' + endMin + ':00';
                  console.log(endTime24);

                  var eDateHTML = '<div class="eventDayBox col-md-4"><div class="eventDay">' + eDay + '</div><div class="eventMonth">' + eMonth + '</div></div>';
                  var iconHTML = '<a  target="_blank" href="http://addtocalendar.com/atc/google?utz=-420&uln=en-US&vjs=1.5&e[0][date_start]=2017-8-05%2010%3A00%3A00&e[0][date_end]=2017-8-05%2017%3A15%3A00&e[0][timezone]=America%2FLos_Angeles&e[0][title]=Recruitment%20Counselor%20Training&e[0][location]=HUB%20332&e[0][organizer_email]=thehub%40uw.edu" class="imgEventSlide col-md-3 ic-calendar"></a>';
                  if(eDay.length == 1) eDay = '0' + eDay;
                  if(eMonthVal.length == 1) eMonthVal = '0' + eMonthVal;
                  console.log(eDay);
                  var timeContent = '<var class="atc_date_start">' + eYear + '-' + eMonthVal + '-' + eDay + ' ' + startTime24 + '</var><var class="atc_date_end">' +  + eYear + '-' + eMonthVal + '-' + eDay + ' ' + endTime24 + '</var>';
                  var timeZone = '<var class="atc_timezone">America/Los_Angeles</var>';
                  var titleContent =  '<var class="atc_title">' + eventItem.eTitle + '</var>';
                  var locContent =  '<var class="atc_location">' + eventItem.eLoc + '</var>';
                  var hubEmail = '<var class="atc_organizer_email">thehub@uw.edu</var>';
                  var calendarContent = '<span class="addtocalendar"><var class="atc_event">' + timeContent + timeZone + titleContent + locContent + hubEmail +'</var></span>';
                  var eLocHTML = '<div class="eventLoc col-md-8">' + eventItem.eLoc + '</div>';
                  var eTimeHTML = '<div class="eventTime col-md-8">' + eventItem.eStart + ' - ' + eventItem.eEnd + '</div>';
                  var slideFull = '<div class="eventFull">' + eDateHTML  + iconHTML + calendarContent + eTitleHTML + eLocHTML + eTimeHTML + '</div>';
                    $("#eSlide").append(slideFull);

            });


            //add to calendar function
            if (window.addtocalendar)if(typeof window.addtocalendar.start == "function")return;
            if (window.ifaddtocalendar == undefined) { window.ifaddtocalendar = 1;
                var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
                s.type = 'text/javascript';s.charset = 'UTF-8';s.async = true;
                s.src = ('https:' == window.location.protocol ? 'https' : 'http')+'://addtocalendar.com/atc/1.5/atc.min.js';
                var h = d[g]('body')[0];h.appendChild(s); }


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
  slidesToScroll: 3,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
  });
    
});




</script>
<script src="//www.washington.edu/static/home/wp-content/themes/boundless/js/homepage.js?ec3099f" type="text/javascript"></script>
<?php get_footer(); ?>
<!-- <a title="Slide title" href="#"><img title="Image title" src="http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/Video-2-1024x678.jpg" alt="Image title" /></a><div><h3><a title="Slide title" href="#">APM Summer Staff Event</a></h3><p>Lorem ipsum.</p></div> -->