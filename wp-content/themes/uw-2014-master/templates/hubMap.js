   //feed for the entire hub
    //http://hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d
    var feed = "//hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d";
    var months = [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", 
                                "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ];
    function Lyceum() {
        $('.rPic').css('background-image', 'url("https://d1bzei02dh3yoz.cloudfront.net/images/spaces/95/hub-lyceum_5__large.jpg")');
        $('#rT').innerHTML="LYCEUM";

    $.ajax(feed, {
        accepts:{
            xml:"application/rss+xml"
        },
        dataType:"xml",
        success:function(data) {
            $(data).find("item").each(function () { 
                var feedInst = $(this);
                  eventItem = {
                    eTitle:       feedInst.find("title").text(),
                    eLoc: feedInst.find("mc\\:location, location").text(),
                    eDate: feedInst.find("mc\\:EventDate, EventDate").text(),
                    eStart: feedInst.find("mc\\:StartTime, StartTime").text(),
                    eEnd: feedInst.find("mc\\:EndTime, EndTime").text(),                
                  }
                  var eTitleHTML = '<div id="eventTitle" class="eventSlideTitle col-md-8">' + eventItem.eTitle.slice(0,20) + '</div>';
                  var dateParse = eventItem.eDate.split("/");
                  var eMonth = months[dateParse[0]-1];
                  var eDay = dateParse[1];
                  var eDateHTML = '<div class="eventDayBox col-md-4"><div class="eventDay">' + eDay + '</div><div class="eventMonth">' + eMonth + '</div></div>';
                  var eTimeHTML = '<div class="eventTime col-md-8">' + eventItem.eStart + ' - ' + eventItem.eEnd + '</div>';
                  var slideFull = '<div class="eventFull">' + eDateHTML  + eTitleHTML + eTimeHTML + '</div>';
                  console.log(eventItem.eLoc);
                  if(eventItem.eLoc.toLowerCase().includes("lyceum")){
                    $("#eSlide").append(slideFull);
                  }
            });
            $('#eSlide').slick('unslick'); /* ONLY remove the classes and handlers added on initialize */
            $('#eSlide').slick({
                arrows: true,
                infinite: false,
          slidesToShow: 2,
          slidesToScroll: 2
          });
        }   
    });
    

    }
    function r145() {
        $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');
        $('.rTitle').innerHTML = "HUB 145";
    $.ajax(feed, {
        accepts:{
            xml:"application/rss+xml"
        },
        dataType:"xml",
        success:function(data) {
            $(data).find("item").each(function () { 
                var feedInst = $(this);
                  eventItem = {
                    eTitle:       feedInst.find("title").text(),
                    eLoc: feedInst.find("mc\\:location, location").text(),
                    eDate: feedInst.find("mc\\:EventDate, EventDate").text(),
                    eStart: feedInst.find("mc\\:StartTime, StartTime").text(),
                    eEnd: feedInst.find("mc\\:EndTime, EndTime").text(),                
                  }
                  var eTitleHTML = '<div id="eventTitle" class="eventSlideTitle col-md-8">' + eventItem.eTitle.slice(0,20) + '</div>';
                  var dateParse = eventItem.eDate.split("/");
                  var eMonth = months[dateParse[0]-1];
                  var eDay = dateParse[1];
                  var eDateHTML = '<div class="eventDayBox col-md-4"><div class="eventDay">' + eDay + '</div><div class="eventMonth">' + eMonth + '</div></div>';
                  var eTimeHTML = '<div class="eventTime col-md-8">' + eventItem.eStart + ' - ' + eventItem.eEnd + '</div>';
                  var slideFull = '<div class="eventFull">' + eDateHTML  + eTitleHTML + eTimeHTML + '</div>';
                  console.log(eventItem.eLoc);
                  if(eventItem.eLoc.toLowerCase().includes("145")){
                    $("#eSlide").append(slideFull);
                  }
            });
            $('#eSlide').slick('unslick'); /* ONLY remove the classes and handlers added on initialize */
            $('#eSlide').slick({
                arrows: true,
                infinite: false,
          slidesToShow: 2,
          slidesToScroll: 2
          });
        }   
    });
    

    }
  $(document).ready(function() {
   
 
jQuery(document).ready(function($){
    $('p > img').unwrap();
});
   





    $('#eSlide').slick({
        arrows: true,
        infinite: true,
  slidesToShow: 2,
  slidesToScroll: 2
  });

  $('.explore').click(function(){
    if( $(window).width() < 1050 ){
        var divID = '#findRSO' + this.id;
        $('html, body').animate({
            scrollTop: $(divID).offset().top
    }, 2000);
    }else{
    $(".discoverC").fadeOut(500);
    $(".make").fadeOut(500);
    $(".explore").fadeOut(500);
    $('.saoTop').css({
        background: "url(https://photos.smugmug.com/Student-Life/i-3QNKrVb/0/015bdb2f/X3/10695848126_ce2b78ab97_o-X3.jpg)",
        backgroundPositionY: "-300px",
        backgroundSize: "cover"}).fadeIn(750);
    $(".exploreTop").fadeIn(1000);
    }
});



$('.discoverC').click(function(){
    $(".discoverC").fadeOut(500);
    $(".make").fadeOut(500);
    $(".explore").fadeOut(500);
    $('.saoTop').css({
        background: "url(https://photos.smugmug.com/Campus-Architecture/Quad/i-9FwzmBF/0/2eae5bc0/X3/170104_January%20Campus_Buildings_00015-X3.jpg)",
        backgroundPosition: "0px, 100px",
        backgroundSize: "cover"}).fadeIn(50);
    // $('.saoTopCov').css("background","rgba(0,0,0,.4)")
    $(".gpssTop").fadeIn(1000);

});
$('.gpssBack').click(function(){
      
    $(".discoverC").fadeIn(500);
    $(".make").fadeIn(500);
    $(".explore").fadeIn(500);
    $('.saoTop').css({
        background: "rgb(255,255,255)"});
    $(".gpssTop").fadeOut(50);
    $('.saoTopCov').css("background","none")


});
$('.make').click(function(){
      
    $(".discoverC").fadeOut(500);
    $(".make").fadeOut(500);
    $(".explore").fadeOut(500);
    $('.saoTop').css({
        background: "url('https://photos.smugmug.com/Husky-Spirit/i-qfFNDs2/0/afcdf961/X3/_MG_1122-X3.jpg')",
        backgroundSize: "cover"}).fadeIn(750);
    $('.saoTopCov').css("background","rgba(255,255,255,.6)")
    $(".asuwTop").fadeIn(500);


    // $('.exploreSub').animate({
    //     opacity: .25,
    //     fontSize: '10em',
    //    }, '4000');
});
$('.asuwBack').click(function(){
      
    $(".discoverC").fadeIn(50);
    $(".make").fadeIn(50);
    $(".explore").fadeIn(50);
    $('.saoTop').css({
        background: "rgb(255,255,255)"});
    $(".asuwTop").fadeOut(0);
    $('.saoTopCov').css("background","none")
    
    

});
$('.rsoBack').click(function(){
      
    $(".discoverC").fadeIn(50);
    $(".make").fadeIn(50);
    $(".explore").fadeIn(50);
    $('.saoTop').css({
        background: "rgb(255,255,255)"});
    $(".exploreTop").fadeOut(0);
    $('.saoTopCov').css("background","none")
    
    

});

  });




  $( function() {
    $( "#tabs" ).tabs();
  } );

 
