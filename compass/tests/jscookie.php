<script language="JavaScript">
<!--

function ReadCookie(cookieName) {
 var theCookie=" "+document.cookie;
 var ind=theCookie.indexOf(" "+cookieName+"=");
 if (ind==-1) ind=theCookie.indexOf(";"+cookieName+"=");
 if (ind==-1 || cookieName=="") return "";
 var ind1=theCookie.indexOf(";",ind+1);
 if (ind1==-1) ind1=theCookie.length; 
 return unescape(theCookie.substring(ind+cookieName.length+2,ind1));
}
//-->
</script>

<script>
document.write(ReadCookie("user"));
</script>
<form name="getCookie">
<table border=0 cellpadding=3 cellspacing=3>
<tr><td>Cookie Name:&nbsp;
</td><td><input name=t1 type=text size=20 value="">
</td></tr>
<tr><td><input name=b1 type=button value="Read Cookie Value"
onClick="this.form.t2.value=ReadCookie(this.form.t1.value)">&nbsp;
</td><td><input name=t2 type=text size=20 value="">
</td></tr>
</table>
</form>

