﻿<?php
require_once ("./include/browseremulator.class.php");

function openpage ($rowurl) {
	$be = new BrowserEmulator();
	$be->addHeaderLine("Referer", "http://www.csmatalent.sk/");   // volani odkud jsi na stranku prisel. pouzij nejakou jejich vychozi stranku.
	$file = $be->fopen($rowurl);

	while ($line = fgets($file, 1024)) {
		$_page.=$line;
	}
	fclose($file);

	if ($_page == "") return FALSE;

	return $_page;
}
$query = $_GET["file"];
if($query) {
   $queryArr = explode(',', $query);
   $link = $queryArr[0];
   $disk = $queryArr[1];
}

//$link = "http://televizia.joj.sk/tv-archiv/crepiny-s-hviezdickou/14-12-2009.html";
echo "<?xml version='1.0' ?>\n";
echo "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\n";

$t1 = explode('http://', $link);
$t2 = explode('/', $t1[1]);
$pref = $t2[0];

if (($html = openpage($link) ) != FALSE) {

$ItemsOut .= "<channel>\n<title>Česko Slovensko má talent</title>";

	$t1 = explode('videoId=', $html);
    $t2 = explode('&', $t1[1]);
    $videoid = $t2[0];

    /*$t1 = explode('pageId: "', $html);
    $t2 = explode('"', $t1[1]);
    $pageid = $t2[0];*/
	//$link1 = "http://".$pref."/services/Video.php?clip=".$videoid."&pageId=".$pageid;	
    $link1 = "http://".$pref."/services/Video.php?clip=".$videoid;
	

	if (($html = openpage($link1) ) != FALSE) {
	
	
		
	$t1 = explode('duration="', $html);
    $t2 = explode('"', $t1[1]);
    $cas = $t2[0];
	
	if ($cas > 0) {
        $mins = floor ($cas / 60);
        $secs = $cas % 60;
        }
	//$time= printf ("%d:%2.1f",$cas, $mins, $secs);		
		
	$t1 = explode('title="', $html);
    $t2 = explode('"', $t1[1]);
    $titulek = $t2[0];
	
	$t1 = explode('thumb="', $html);
    $t2 = explode('"', $t1[1]);
    $nahled = $t2[0];
	
	 $prep = "n06.joj.sk";
	
	$t1 = explode(' label="', $html);
    $t2 = explode('"', $t1[1]);
    $quality = $t2[0];
	
	$t1 = explode('path="', $html);
    $t2 = explode('"', $t1[1]);
    $Y = $t2[0];
	
	
	$S = "http://a.static.csmatalent.sk/fileadmin/templates/swf/CsmtPlayer.swf?no_cache=168842";
	$C = "1935";
	$N = $prep;
	$T = ("rtmp://".$prep);
	
			
	
   
	$ItemsOut .= "
			<item>
				<title>".$titulek." - kvalita: ".$quality."</title>
			    <link>".$disk."xLiveCZ/nova.sh?type=mp4jh&amp;n=".$N."&amp;t=".$T."&amp;p=".$link."&amp;s=".$S."&amp;y=".$Y."&amp;c=".$C."</link>
				<enclosure type=\"video/mp4\" url=\"".$disk."xLiveCZ/nova.sh?type=mp4jh&amp;n=".$N."&amp;t=".$T."&amp;p=".$link."&amp;s=".$S."&amp;y=".$Y."&amp;c=".$C."\"/>
				<description>Délka videa: ".$mins.":".$secs."</description>
				<media:thumbnail url=\"".$nahled."\" />
			</item>\n";
			
   }

	$ItemsOut .= "</channel>\n</rss>";
	echo $ItemsOut;
} else {
	echo "TEST SELHAL !";
}
?>