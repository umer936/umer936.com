<?
include '../db.php';
include '../ckban.php';
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<a href="#" style="position:absolute; left: 475; top: 68; z-index:99999;" onclick="createNewTab('dhtmlgoodies_tabView1','A dynamic tab','','externalfile.html',true);return false">
<img src=http://2.bp.blogspot.com/-f29krO37a-w/TbSRjpOL31I/AAAAAAAAAOE/8rEHKEdXqqw/s1600/tab_new_1222_128.png height=35></a>
<head>
	<title>Compass Tabs</title>
	<style type="text/css">
	body{
		margin:10px;
		font-size:0.9em;
	}
	a{
		color:#F00;
	}
	</style>
	<link rel="stylesheet" href="css/tab-view.css" type="text/css" media="screen">
	<script type="text/javascript" src="js/ajax.js"></script>
	<script type="text/javascript" src="js/tab-view.js">
	/************************************************************************************************************
	(C) www.dhtmlgoodies.com, October 2005
	
	This is a script from www.dhtmlgoodies.com. You will find this and a lot of other scripts at our website.	
	
	Terms of use:
	You are free to use this script as long as the copyright message is kept intact. However, you may not
	redistribute, sell or repost it without our permission.
	
	Updated:
		
		March, 14th, 2006 - Create new tabs dynamically
	
	Thank you!
	
	www.dhtmlgoodies.com
	Alf Magne Kalleland
	
	************************************************************************************************************/		
	</script>
</head>
<body>
<img src="http://img829.imageshack.us/img829/9954/cooltext548897487.png">
<div id="dhtmlgoodies_tabView1">
	<div class="dhtmlgoodies_aTab">
		<img src="http://www.highdots.com/images/ctd/multi-tabs.png" style="float:left;margin-right:5px;margin-bottom:5px"> This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function.  This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function.  This is the content of the first tab. This is just a plain &lt;DIV>. The tabs
		are created by a javascript function. 	<br><br>
		<a href="#" onclick="createNewTab('dhtmlgoodies_tabView1','A dynamic tab','','externalfile.html',true);return false">Create new tab dynamically</a><br>
		<a href="#" onclick="deleteTab('Menu scripts')">Remove this tab</a><br>
		

		
		
	</div>
	<div class="dhtmlgoodies_aTab">
		This is the content of the second tab.	<br>
		<a href="#" onclick="deleteTab('Calendar')">Remove this tab</a><br>
	</div>
	<div class="dhtmlgoodies_aTab">
		This script is tested in 
		<a href="#" onclick="deleteTab('Menus')">Remove this tab</a><br>
		<ul>
			<li>IE 5.5</li>
			<li>IE 6</li>
			<li>Opera 8.5</li>
			<li>Firefox</li>
		</ul>	
	</div>
	<div class="dhtmlgoodies_aTab">
		Content of tab 4<br>
	</div>
</div>
<script type="text/javascript">
initTabs('dhtmlgoodies_tabView1',Array('Menu scripts','Calendar','Menus','About us'),0,500,400,Array(true,true,true,true));
</script>
</body>
</html>