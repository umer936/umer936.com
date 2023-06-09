<div id=top>


<?php 
$cur_dir = explode('\\', getcwd());
$dir = $cur_dir[count($cur_dir)-1]; 

?>


<a href="http://google.com/+UmerSalman">
<img src="/images/logoh.png" width="48" height="48"> 
</a>
<a href="/">
<div id="name">
Umer Salman 
<br />
Umer936
</div>
</a>

<div id="nav">
<?php
if (strpos($dir,'stuff') !== false) {
echo "
<a style=\"color:#00CDCD\" href=/>
Home
</a>
| 
<a style=\"color:4A777A\" href=/stuff>
What I do
</a>
| 
<a style=\"color:#00CDCD\" href=/blog>
How I do it
</a> 
| 
<a style=\"color:#00CDCD\" href=/about> 
About Me
</a>
</div>";
}
elseif (strpos($dir,'blog') !== false) {
echo "
<a style=\"color:#00CDCD\" href=/>
Home
</a>
| 
<a style=\"color:#00CDCD\" href=/stuff>
What I do
</a>
| 
<a style=\"color:4A777A\" href=/blog>
How I do it
</a> 
| 
<a style=\"color:#00CDCD\" href=/about> 
About Me
</a>
</div>";
}
elseif (strpos($dir,'about') !== false) {
echo "
<a style=\"color:#00CDCD\" href=/>
Home
</a>
| 
<a style=\"color:#00CDCD\" href=/stuff>
What I do
</a>
| 
<a style=\"color:#00CDCD\" href=/blog>
How I do it
</a> 
| 
<a style=\"color:4A777A\" href=/about> 
About Me
</a>
</div>";
}
else {
echo "
<a style=\"color:4A777A\" href=/>
Home
</a>
| 
<a style=\"color:#00CDCD\" href=/stuff>
What I do
</a>
| 
<a style=\"color:#00CDCD\" href=/blog>
How I do it
</a> 
| 
<a style=\"color:#00CDCD\" href=/about> 
About Me
</a>
</div>";
}
?>
</div> 


<phonenav>
	<ul>
		<li id="phonenav"><a href="#">&#9776; Menu</a>
			<ul id="actualphonenav">
			
			
			
			
<?php
if (strpos($dir,'stuff') !== false) {
echo "
<li><a style=\"color:#00CDCD\" href=/>
Home
</a></li>
<br /> 
<li><a style=\"color:4A777A\" href=/stuff>
What I do
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/blog>
How I do it
</a></li> 
<br /> 
<li><a style=\"color:#00CDCD\" href=/about> 
About Me
</a></li>";
}
elseif (strpos($dir,'blog') !== false) {
echo "
<li><a style=\"color:#00CDCD\" href=/>
Home
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/stuff>
What I do
</a></li>
<br /> 
<li><a style=\"color:4A777A\" href=/blog>
How I do it
</a></li> 
<br /> 
<li><a style=\"color:#00CDCD\" href=/about> 
About Me
</a></li>";
}
elseif (strpos($dir,'about') !== false) {
echo "
<li><a style=\"color:#00CDCD\" href=/>
Home
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/stuff>
What I do
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/blog>
How I do it
</a></li> 
<br /> 
<li><a style=\"color:4A777A\" href=/about> 
About Me
</a></li>";
}
else {
echo "
<li><a style=\"color:4A777A\" href=/>
Home
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/stuff>
What I do
</a></li>
<br /> 
<li><a style=\"color:#00CDCD\" href=/blog>
How I do it
</a></li> 
<br /> 
<li><a style=\"color:#00CDCD\" href=/about> 
About Me
</a></li>";
}
?>
			
			
			
			
			
			
			</ul>
		</li>
	</ul>
</phonenav>

<div id="actualphonenav" class="phonenav">













</div>












 <footer>
 ©2014 Umer Salman
 </footer>
 
 <div id="destroy">
 <span onclick="javascript:var KICKASSVERSION='2.0';var s = document.createElement('script');s.type='text/javascript';document.body.appendChild(s);s.src='//hi.kickassapp.com/kickass.js';void(0);">
 Destroy this page</span>
 </div>