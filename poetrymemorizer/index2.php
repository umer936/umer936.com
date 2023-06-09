<?php

if($_POST['poem'])
{
	$poem = explode(PHP_EOL, $_POST['poem']);
}

elseif($_POST['poemname'])
{
	$poemname = urlencode($_POST['poemname']);
	$link = file_get_contents("https://www.poetryoutloud.org/search?q=$poemname");
	$file = strip_tags($link, "<a>");
	preg_match_all("/<a href=\"\/poem\/.*\">.*<\/a>/im", $file, $content);
	// print_r($content[0][0]);
	preg_match_all("/\/poem\/\d*/im", $content[0][0], $numcontent);
	// echo "<hr>";
	$numcontent = $numcontent[0][0];

	$link = file_get_contents("http://www.poetryoutloud.org$numcontent");
	$file = strip_tags($link, "<div>");
	preg_match_all("/<div style=.*>(.*)<\/div>/im", $file, $content);
	// print_r($content[0]);
	// echo $content[0];
	$poem = $content[0];
	if(!$poem)
	{
		echo "Poem not found on Poetry Out Loud. Check spelling and try again.";
	}
}

else
{
	echo "No poem";
}

echo "<style>#show:not(:checked) ~ .line { display: none }</style>

<input type='checkbox' id='show' checked/> <label for='show'>Show/Hide lines</label>
<hr>";

foreach ($poem as $line) {
	echo "<div class=line>$line </div>
	<input type=text placeholder='Copy line'></input>
	<br><br>";
}
