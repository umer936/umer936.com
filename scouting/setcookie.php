<html manifest="cache.manifest">
<head>
Please hit the "Go!" button rather than using the Enter key because I am lazy. <hr />
	<script>
		var today = new Date();
		var expiry = new Date(today.getTime() + 6 * 24 * 3600 * 1000); // plus 6 days
		
		function setCookie(name, value)
		{
			document.cookie = "Scout=" + escape(value) + "; path=/; expires=" + expiry.toGMTString();
		}
		
		function putCookie(form)
	    {
	    	setCookie("Scout", form[0].Scout.value);
	    	window.location = "/";
			return true;
		}
	</script>
</head>

<body>
	<form>
		<input type="text" placeholder="Enter Your Name" id="nameBox" name='Scout'>
		<input type="button" value="Go!" id="submit" onclick="putCookie(document.getElementsByTagName('form'));">
	</form>
</body>


</html>