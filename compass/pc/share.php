<div id="toolbarbut"> <!-- hide button -->
<span class="showbar">
<a href="#">
<img src="http://mubbistyling.webs.com/toolbar/images/uparrow.png" border="0px">Show Bar</a></span>
</div>

<div id="toolbar"> <!-- toolbar container -->

<div class="leftside"> 
<!-- all things in floating left side -->
  <ul id="social">
    <li><a class="rss" href="#"></a><!-- icon-->
<div id="tiprss" class="tip"><!-- tooltip -->
<ul>
<li>
<a href="http://YOURSITE.webs.com/apps/blog/entries/feed/rss">
Become Our Readers</a>
</li>
</ul>  
</div>
</li>
<li><a class="facebook" href="#"></a>
<div id="tipfacebook" class="tip">
<ul>
<li>
<a href="http://www.facebook.com/YOur-group/page-link-here">
Follow Us On FaceBook</a>
</li>
</ul>  
</div>  
</li>
<li><a class="twitter" href="#"></a>
<div id="tiptwitter" class="tip">
<ul>
<li>
<a href="http://www.twitter.com/YOur-group/page-link-here">
Follow Us On Twitter</a>
</li>
</ul>  
</div>
</li>
</li>
</li>
</li>
</ul>
</div>

<div class="rightside"> 
<!-- all things in floating left side -->
<span class="downarr"> <!-- hide button -->
<a href="#"></a>
</span>
<span class="menu_title">
<a class="menutit" href="#">Members Menu</a> 
<!-- quick menu title -->
</span>
<div class="quickmenu">
<ul> <!-- quick menu list -->
<li><a 

href="">NOTE: THIS MENU DOESNOT WORK</a></li>
  <li><a 

href="http://YOURSITE.webs.com/apps/profile/photos/">My 

Photos</a></li>
      <li><a 

href="http://YOURSITE.webs.com/apps/profile/friendRequests/">Fr

iend Requests</a></li>
      <li><a 

href="http://YOURSITE.webs.com/apps/profile/friends/">My 

Friends</a></li>
      <li><a 

href="http://YOURSITE.webs.com/apps/profile/profileForm">Edit 

Profile</a></li>
      <li><a 

href="http://www.YOURSITE.webs.com/apps/profile">My 

Profile</a></li>
  <li><a 

href="http://www.YOURSITE.webs.com/apps/profile/messages/">Inbo

x</a></li>
      <li><a 

href="http://YOURSITE.webs.com/apps/auth/login">Sign 

In</a></li>
          </ul> 
  </div>
</div>

</div>





<link href="/pc/css/sharecss.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/pc/js/jquery-1.3.2.min.js" ></script>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script>


<script type="text/javascript">

$(document).ready(function(){

  //hide toolbar and make visible the 'show' button
  $("span.downarr a").click(function() {
    $("#toolbar").slideToggle("fast");
    $("#toolbarbut").fadeIn("slow");    
  });

  //show toolbar and hide the 'show' button
  $("span.showbar a").click(function() {
    $("#toolbar").slideToggle("fast");
    $("#toolbarbut").fadeOut();    
  });

  //show tooltip when the mouse is moved over a list element 
  $("ul#social li").hover(function() {
    $(this).find("div").fadeIn("fast").show(); //add 'show()'' for IE
    $(this).mouseleave(function () { //hide tooltip when the mouse moves off of the element
        $(this).find("div").hide();
    });
  });
  
  //don't jump to #id link anchor 
  $(".facebook, .twitter, .delicious, .digg, .rss, .stumble, .menutit, span.downarr a, span.showbar a").click(function() {
   return false;                                         
  });

  //show quick menu on click 
  $("span.menu_title a").click(function() {
    if($(".quickmenu").is(':hidden')){ //if quick menu isn't visible 
      $(".quickmenu").fadeIn("fast"); //show menu on click
    }
    else if ($(".quickmenu").is(':visible')) { //if quick menu is visible 
      $(".quickmenu").fadeOut("fast"); //hide menu on click
    }
  });
  
  //hide menu on casual click on the page
  $(document).click(function() {
      $(".quickmenu").fadeOut("fast");
      $(".quickmenu").css({'vivibility': 'hidden'});
  });
  $('.quickmenu').click(function(event) { 
    event.stopPropagation(); //use .stopPropagation() method to avoid the closing of quick menu panel clicking on its elements 
  });

    
});
   //show quick menu on click 
  $("span.menu_title a").click(function() {
    if($(".online").is(':hidden')){ //if quick menu isn't visible 
      $(".online").fadeIn("fast"); //show menu on click
    }
    else if ($(".online").is(':visible')) { //if quick menu is visible 
      $(".online").fadeOut("fast"); //hide menu on click
    }
  });
</script>