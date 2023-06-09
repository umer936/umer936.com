<?
include '/analytics.php'; 
?>
<script src="html2canvas.js"></script>

<link href='https://fonts.googleapis.com/css?family=Old+Standard+TT:400,400italic,700|Montserrat:400,700' rel='stylesheet' type='text/css'>


<style>
html,
body,
div,
span,
h1,
blockquote {
  background: transparent;
  border: 0;
  font-size: 100%;
  margin: 0;
  outline: 0;
  padding: 0;
  vertical-align: baseline
}

h1 {
  color: #464646;
  font-family: 'Old Standard TT', serif;
  font-weight: 700;
  text-transform: uppercase;
  font-size: 54px;
  font-weight: 400
}

html,
body,
p,
a,
h1 {
  -webkit-font-smoothing: antialiased;
  text-rendering: optimizeLegibility
}

img {
  border: 0;
  border-style: none
}

html,
body {
  height: 100%;
  font-size: 13px;
  font-family: 'Montserrat', sans-serif;
  background: #000
}

#sharebox {
  z-index: 9999;
  width: 50%;
  position: fixed; 
  top: 25%;
  height: 50%;
}

.hero {
  width: 100%;
  /*min-width: 1080px;*/
  height: 680px;
  position: relative;
  overflow: hidden
}

.hero .hero_message {
  padding-top: 40px;
  width: 531px;
  height: 244px;
  background: url(http://i.imgur.com/EKeTEzD.png) 0 0 no-repeat;
  position: absolute;
  bottom: 50px;
  left: 20px;
  margin-left: 0;
  text-align: center;
  z-index: 300
}

.hero .hero_message h1 {
  font-family: 'Montserrat', sans-serif;
  font-size: 40px;
  letter-spacing: .2em;
  color: #fff;
  line-height: 50px
}

.hero .hero_message h1 span {
  font-family: 'Old Standard TT', serif;
  font-weight: 400;
  font-size: 90px;
  display: block;
  padding: 25px 0;
  letter-spacing: 0
}

.hero .hero_image {
  width: 100%;
  /*min-width: 1080px;*/
  height: auto
}

.hero .hero_image img {
  width: 100%;
  height: 100%
}

@media only screen and (min-width:1025px) and (max-width:1079px) {
  .hero {
    min-width: inherit
  }
  .hero .hero_image {
    min-width: inherit
  }
}

@media only screen and (min-width:768px) and (max-width:1024px) {
  .hero {
    min-width: inherit;
    height: auto
  }
  .hero .hero_image {
    min-width: inherit
  }
}

@media screen and (max-width:767px) {
  .hero {
    min-width: inherit;
    height: auto;
    /*min-height: 180px*/
  }
  .hero .hero_image {
    min-width: inherit
  }
  .hero .hero_image img {
    max-width: 100%;
    min-height: inherit;
    display: block
  }
  .hero .hero_message {
    bottom: 4%;
    margin-left: 0;
    left: 4%;
    width: 92%;
    background-size: 100% 100%;
    height: calc(100% - 66px);
    padding: 20px 0
  }
  .hero .hero_message h1 {
    font-size: 20px;
    line-height: 45px
  }
  .hero .hero_message h1 span {
    font-size: 50px;
    padding: 0
  }
</style>

<div id="open">
<font color=white>
  Doubleclick "Edit Text" to edit. 
  <input type=text id=url placeholder="Background Image URL">
  </input>
  <button> Hide this bar</button>



<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Make Great again -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8799475731062766"
     data-ad-slot="9662414532"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


</font>
</div>
  <div id="share" style="z-index: 999;">Test Screenshot</div>
<section class="hero">
  <div class="hero_message">
    <h1>Make <span>edit text</span> Great Again!</h1>
  </div>
  <div class="hero_image">
<img src="http://i.imgur.com/AbKxFxp.jpg" id="Banner" alt="Trump Banner">
</div>
</section>
<!-- <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<div id="sharebox"></div>

<script>
$('#share').bind('click', 
function() {
  html2canvas(document.body, {
  onrendered: function(canvas) {
    var img = new Image();
    // img.setAttribute('crossOrigin', 'anonymous');
    // img.crossOrigin = "Anonymous";
    // img.src = canvas.toDataURL("image/png");
    document.getElementById('sharebox').appendChild(canvas);
  },
  allowTaint: true,
  background: undefined
});
}
);
</script>
<script>
$('span').bind('dblclick',
  function() {
    $(this).attr('contentEditable', true);
  });
</script>
<script>
$('#url').on('mouseout',
	function(){
		newSrc = $("#url").val();
		$("img").attr('src', newSrc);
		});
</script>
<script>
$('button').on('click',
	function(){
		$("#open").toggle();
		});
</script>