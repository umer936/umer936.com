<html lang="en"><head>
	<title>jQuery UI Carousel - Woohoo!</title>
	<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/external/jquery-1.3.2.js"></script>
	<script src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/jquery.mousewheel.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/external/ui.core.js"></script>
	<script type="text/javascript" src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/ui.carousel.js"></script>
	<link type="text/css" href="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/demos.css" rel="stylesheet">
	<style type="text/css">
	
		.demo {
			border: 1px solid #eee;
			background: #000;
		}
		#carousel { position: relative; height: 350px; margin: 0; padding: 0; }
		#carousel li { float: left; cursor: pointer; cursor: hand; list-style: none; margin: 0; padding: 0; width: 128px; height: 128px; }
		#carousel li img { height: 100%; width: 100%; }	
	
	</style>
	<script type="text/javascript">
	$(function() {
		//You don't need this timeout in your pages - Safari has stupid issues with our demo system
		window.setTimeout(function() {
			
			$("#carousel").carousel({
				tilt: 50,
				pausable: false,
				handle: $("#carousel").parent()
			});
			
			var offset = $('div.demo').offset(), radius = 200, distance = 0.7, size = 128;
			$('div.demo')
				.bind($.browser.mozilla ? 'DOMMouseScroll' : 'mousewheel', function(event) {

					if ( event.wheelDelta ) delta = event.wheelDelta/120;
					if ( event.detail     ) delta = -event.detail/3;
					if ( $.browser.opera  ) delta = -event.wheelDelta;
					
					radius += delta;
					size += delta * 0.66;

					$("#carousel").carousel('option', {
						radius: radius,
						width: size,
						height: size
					});

					event.preventDefault();
				})
				.bind('mousemove', function(event) {
					var position = event.pageY - offset.top;
					$("#carousel").carousel('option', 'tilt', ((position / this.offsetHeight) - 0.5) * -200);
			});
			
		}, $.browser.safari ? 100 : 0);
	});
	</script>
</head>
<body style="">
<div class="demo">

<ul id="carousel">
	<li style="position: absolute; top: 146.60126810963737px; left: 756.146447553718px; width: 107.1454939850224px; height: 107px; z-index: 83; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/1.png" alt=""></li>		
	<li style="position: absolute; top: 148.69535958887042px; left: 607.1475163746538px; width: 127.93350951046985px; height: 127px; z-index: 99; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/2.png" alt=""></li>		
	<li style="position: absolute; top: 147.00091387828735px; left: 471.53526016940833px; width: 111.27014225479333px; height: 111px; z-index: 86; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/3.png" alt=""></li>		
	<li style="position: absolute; top: 143.69680579545803px; left: 428.7494993989995px; width: 66.91656676156445px; height: 66px; z-index: 52; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/4.png" alt=""></li>		
	<li style="position: absolute; top: 130.89873189036263px; left: 495.0808054537709px; width: 38.400000000000006px; height: 38px; z-index: 16; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/5.png" alt=""></li>		
	<li style="position: absolute; top: 118.80464041112958px; left: 633.6857288701113px; width: 38.400000000000006px; height: 38px; z-index: 0; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/6.png" alt=""></li>		
	<li style="position: absolute; top: 128.49908612171265px; left: 777.629668703195px; width: 38.400000000000006px; height: 38px; z-index: 13; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/7.png" alt=""></li>		
	<li style="position: absolute; top: 142.80319420454197px; left: 831.2505006010005px; width: 61.08343323843554px; height: 61px; z-index: 47; "><img src="http://jquery-ui.googlecode.com/svn/branches/labs/carousel/demo/icons/8.png" alt=""></li>
</ul>

</div><!-- End demo -->

<div class="demo-description">

<p>
	Wooohoooooooooooo!
</p>

</div><!-- End demo-description -->



</body></html>