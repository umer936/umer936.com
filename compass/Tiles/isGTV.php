<script>
var userAgent = navigator.userAgent;
return userAgent;

function isGoogleTvBrowser(useragent) {
  return Boolean(useragent.match(/(Large Screen)|GoogleTV/i));
}

</script>