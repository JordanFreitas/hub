    
   //feed for the entire hub
    //http://hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d
    var feed = "//hubres.uw.edu/hubcal/RSSFeeds.aspx?data=tA%2bhCNXmZerO%2bljV3wfOHfhHrmtFlH8CFNokuL51aHje9Ixz6L4Ym1H8wBXpgCvs%2bcAm0v4TEAQ%3d";
    var months = [ "JAN", "FEB", "MAR", "APR", "MAY", "JUN", 
                                "JUL", "AUG", "SEP", "OCT", "NOV", "DEC" ];

    function info(roomData) {
        console.log(roomData)
        var rBool = false;
        switch (roomData.toLowerCase()) {
            case "lyceum":
                $('.rPic').css('background-image', 'url("https://d1bzei02dh3yoz.cloudfront.net/images/spaces/95/hub-lyceum_5__large.jpg")');        
                break;
            case "145":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');                    
                break;
            case "commuter commons":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
            case "student services":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
            case "admin suite":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
            case "info tech":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
             case "resource center":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
             case "us bank":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/usbanklogo.jpg")');        
                break;
             case "bike shop":
            $('.rPic').css('background-image', 'url("http://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub_145-6.jpg")');        
                break;
                 case "welcome center":
            $('.rPic').css('background-image', 'url("https://depts.washington.edu/thehub/wordpress/wp-content/uploads/2013/09/hub-106_1.jpg")');        
                break;
                 case "112":
            default:
            $('.rPic').css('background-image', '');                    
        }
        document.getElementById('rT').innerText = roomData;
    
        
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
                  var slideFull = '<div id="eventList" class="eventFull">' + eDateHTML  + eTitleHTML + eTimeHTML + '</div>';
                  var check = roomData.toLowerCase();
                  if(eventItem.eLoc.toLowerCase().includes(check)){
                      rBool = true;
                    $("#eSlide").append(slideFull);
                  }
            });
          var eventList = document.getElementById('eSlide'); 
          if (rBool == false){
              if (eventList != null) {
                  //removes slider components if not an event room
                   $('#eSlide div').empty();
              }
          }
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

// $("#tabs")
// .delegate("li.ui-tabs-selected","mousedown",function(){
//   $tabs.tabs("load",$(this).index());
// });

$('#tab1').click(function(){
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-1";
    location.reload();
});
$('#tab2').click(function(){
    // $('#tabs-2').load(document.URL +  ' #tabs-2');
    // console.log("clicked");
    // $('#tabs').tabs('load', 1);
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-2";
    location.reload();
    
    // var tab = $('#tabs').tabs('load', 1);
    // tab.panel('refresh');
    
    // window.location.hash = 'tabs-2';
    // window.location.reload();
});
$('#tab3').click(function(){
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-3";
    location.reload();
});
$('#tab4').click(function(){
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-4";
    location.reload();
});
$('#tab5').click(function(){
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-5";
    location.reload();
});
$('#tab6').click(function(){
    console.log("clicked");
    window.location = "https://depts.washington.edu/hubway/hub/hub-maps/#tabs-6";
    location.reload();
});

  });

  $( function() {
    $( "#tabs" ).tabs();
  } );

 
