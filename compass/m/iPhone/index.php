<html xmlns="http://www.w3.org/1999/xhtml"><head>
<script type="application/x-javascript" src="http://joehewitt.com/files/iphone/iphonenav.js"></script>
<title>iPhone Navigation</title>
<? include '../../ckban.php'; ?>
<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta names="apple-mobile-web-app-status-bar-style" content="black-translucent" /> 
<link rel="stylesheet" type="text/css" href="http://joehewitt.com/files/iphone/iphonenav.css">
</head>

<body orient="landscape" style="">
    <h1 id="pageTitle">iPod Home</h1>
    <a id="homeButton" class="button" href="#home" style="display: none; ">Home</a>
    <a class="button" href="#searchForm">Search</a>
    
    <ul id="home" title="iPod Home" selected="true">
        <li><a href="#Login">Login</a></li>
        <li><a href="#Register">Register</a></li>
<? $user = $_COOKIE['user']; if($user!="") {echo "
        <li><a href='#Status'>Status</a></li>
        <li><a href='#Profile'>Profile</a></li>
        <li><a href='#Zero7'>Zero 7</a></li>";} else {echo "
<li>Please</li>
        <li>Login or</li>
        <li>Register</li>";} ?>
    </ul>
    <ul id="Login" title="Login">
    <iframe src=login.php width=100%></iframe>
    </ul>
    <ul id="Register" title="Register">
    <iframe src=register.php width=100%></iframe>
    </ul>
    <ul id="Status" title="Status">
    <iframe src=/status width=100% height=90%></iframe>
    </ul>
    <ul id="Profile" title="Profile">
        <iframe src=/profiles/?user=<? echo"$user" ?> width=100% height=90%></iframe>
    </ul>
    <ul id="Zero7" title="Zero 7">
        <li><a href="#songs">The Garden</a></li>
        <li><a href="#songs">Simple Things</a></li>
        <li><a href="#songs">When it Falls</a></li>
    </ul>
    <ul id="songs" title="Songs">
        <li><a href="#player">Song 1</a></li>
        <li><a href="#player">Song 2</a></li>
        <li><a href="#player">Song 3</a></li>
        <li><a href="#player">Song 4</a></li>
        <li><a href="#player">Song 5</a></li>
        <li><a href="#player">Song 6</a></li>
        <li><a href="#player">Song 7</a></li>
        <li><a href="#player">Song 8</a></li>
        <li><a href="#player">Song 9</a></li>
        <li><a href="#player">Song 10</a></li>
        <li><a href="#player">Song 11</a></li>
    </ul>
    <div id="player" class="panel" title="Now Playing">
        <h2>If this weren't just a demo, you might be hearing a song...</h2>
    </div>
    <div id="searchResults" class="panel" title="Search">
        <h2>Search results go here...</h2>
    </div>
    <form id="searchForm" class="dialog" action="#searchResults">
        <fieldset>
            <h1>Music Search</h1>
            <a class="button toolButton goButton" href="#searchResults">Search</a>
            
            <label>Artist:</label>
            <input type="text">
            <label>Song:</label>
            <input type="text">
        </fieldset>
    </form>


</body></html>