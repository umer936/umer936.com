
<!doctype html>  
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		
		<title>CSS3 Hologram</title>
		
		<meta name="viewport" content="width=700, initial-scale=0.3">
		
		<link rel="stylesheet" href="css/reset.css">
		<link rel="stylesheet" href="css/main.css">
		
		<link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'>
		
		<script type="text/javascript">
		/* <![CDATA[ */
		    (function() {
		        var s = document.createElement('script'), t = document.getElementsByTagName('script')[0];
		        s.type = 'text/javascript';
		        s.async = true;
		        s.src = 'http://api.flattr.com/js/0.6/load.js?mode=auto';
		        t.parentNode.insertBefore(s, t);
		    })();
		/* ]]> */
		</script>
	</head>
	
	<body>
		
		<header>
			<a href="http://hakim.se/experiments/css3-hologram">About this experiment</a>
			
			<div class="facebook-button">
				<iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fhakim.se%2Fexperiments%2Fcss3-hologram&amp;layout=button_count&amp;show_faces=false&amp;width=90&amp;action=like&amp;font=arial&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
			</div>
			
			<div class="tweet-button">
				<a href="http://twitter.com/share" class="twitter-share-button" data-text="Holobox - A CSS3 3D cube that adapts to device orientation. Created by @hakimel." data-url="http://hakim.se/experiments/css3-hologram" data-count="horizontal" data-related="hakimel"></a>
				<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
			</div>
			
			<div class="flattr-button">
				<a class="FlattrButton" style="display:none;" rev="flattr;button:compact;" href="http://hakim.se/experiments/css3-hologram"></a>
			</div>
		</header>
		
		<div id="world">
			<div id="room">
				<div id="back">
					<h1>Holobox</h1>
					<p>
						This box adapts to the orientation of your device.
					</p>
					<p>
						Requires webkit on a mobile device, such as iPhone.
					</p>
				</div>
				<div id="front"></div>
				<div id="wall-left"></div>
				<div id="wall-right"></div>
				<div id="wall-top"></div>
				<div id="wall-bottom"></div>
				<div id="shadow"></div>
			</div>
		</div>
			
		<script src="js/hakim.holobox.js"></script>
		
		
		
		<!-- Everything below this point is unrelated to the holograph logic -->
		
		<script>
		var _gaq = [['_setAccount', 'UA-15240703-1'], ['_trackPageview']];
		(function(d, t) {
		var g = d.createElement(t),
		    s = d.getElementsByTagName(t)[0];
		g.async = true;
		g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		s.parentNode.insertBefore(g, s);
		})(document, 'script');
		</script>
		
		<style>a[href="http://www.w3counter.com"] { display: none!important; }</style>
		<script src="http://www.w3counter.com/tracker.js"></script>
		<script>
			w3counter(49720);
			var ps = document.createElement('script');
				ps.type = 'text/javascript';
				ps.async = true;
				ps.src = '//pulse.w3counter.com/pulse.js?id=49720';
			(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(ps);
		</script>
		
		
	</body>
</html>