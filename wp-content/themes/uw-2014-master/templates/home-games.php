<?php
/**
 * Template Name: home-games
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
    <link rel='stylesheet' id='uw-master-css'  href='http://localhost/hub/wp-content/themes/uw-2014-master/games.css?ver=3.6' type='text/css' media='all' />
    <link href="//www.washington.edu/static/home/wp-content/themes/boundless/style.css?ec3099f" id="homepage-css" media="all" rel="stylesheet" type="text/css"/>

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
    var feed = "http://hubres.uw.edu/hubcal/RSSFeeds.aspx?data=exfsp9BbGwOa3zSOgl8KgBXBFMpkD%2f8wB4cyJyjsaky0zfodIX0a4vbFGmpnTFgw";
    
    $.ajax(feed, {
        accepts:{
            xml:"application/rss+xml"
        },
        dataType:"xml",
        success:function(data) {
            
            var slde = '<div class="slide">';
            var aslde = '<a class = "slideA" title="Slide title" href="#">';
            var img = '<img title="Image title" src="https://scontent.fsnc1-1.fna.fbcdn.net/v/t31.0-8/21015881_1850118501683348_2034974718194203291_o.jpg?oh=af11400bea19d178ac394b46dfa258d0&oe=5A2F9867" alt="Image title" />';
            
            $(data).find("item").each(function () { 
                var feedInst = $(this);
                  eventItem = {
                    title:       feedInst.find("title").text(),
                    link:        feedInst.find("link").text(),
                    description: feedInst.find("description").text(),
                  }
                  var before = '<div class="slide"><a title="Slide title" href="#"><img title="Image title" src="http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/Video-2-1024x678.jpg" alt="Image title" /></a><div><h3><a title="Slide title" href="#">' + eventItem.title + '</a></h3><p>Lorem ipsum.</p></div></div>';
                  var after = eventItem.title;
                  var aft = eventItem.link;


                 
                    $('#rssSlider')
                    // .append(start)
                    .append(before);
                    // .wrap('<div>')
                    // .append(aft);

                    // .append(slde);

                    $('.slide')
                    .append(aslde);
                    $('.slideA')
                    .append(img);

               console.log(before);
            });
    

        }   
    });
    
});


</script>
<script src="//www.washington.edu/static/home/wp-content/themes/boundless/js/homepage.js?ec3099f" type="text/javascript"></script>
<?php get_footer(); ?>
<!-- <a title="Slide title" href="#"><img title="Image title" src="http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/Video-2-1024x678.jpg" alt="Image title" /></a><div><h3><a title="Slide title" href="#">APM Summer Staff Event</a></h3><p>Lorem ipsum.</p></div> -->