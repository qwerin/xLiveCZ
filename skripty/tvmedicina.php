﻿<?php
// ###############################################################
// ##                                                           ##
// ##   http://sites.google.com/site/pavelbaco/                 ##
// ##   Copyright (C) 2012  Pavel Bačo   (killerman)            ##
// ##                                                           ##
// ###############################################################

require_once ("./include/browseremulator.class.php");

function openpage ($rowurl) {
	$be = new BrowserEmulator();
	$be->addHeaderLine("Referer", "http://www.tvmedicina.cz/");   // volani odkud jsi na stranku prisel. pouzij nejakou jejich vychozi stranku.
	$file = $be->fopen($rowurl);

	while ($line = fgets($file, 1024)) {
		$_page.=$line;
	}
	fclose($file);

	if ($_page == "") return FALSE;

	return $_page;
}
echo "<?xml version='1.0' encoding='UTF8' ?>";
?>
<rss version="2.0">
<onEnter>
  startitem = "middle";
  setRefreshTime(1);
</onEnter>

<onRefresh>
  setRefreshTime(-1);
  itemCount = getPageInfo("itemCount");
</onRefresh>

<mediaDisplay name="threePartsView"
	sideLeftWidthPC="0"
	sideRightWidthPC="0"
	headerImageWidthPC="0"
	selectMenuOnRight="no"
	autoSelectMenu="no"
	autoSelectItem="no"
	itemImageHeightPC="0"
	itemImageWidthPC="0"
	itemXPC="3"
	itemYPC="25"
	itemWidthPC="52"
	itemHeightPC="8"
	capXPC="3"
	capYPC="25"
	capWidthPC="52"
	capHeightPC="64"
	itemBackgroundColor="0:0:0"
	itemPerPage="8"
    itemGap="0"
	bottomYPC="90"
	backgroundColor="0:0:0"
	showHeader="no"
	showDefaultInfo="no"
	imageFocus=""
	sliding="no" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10"
>

 	<text align="center" offsetXPC="0" offsetYPC="0" widthPC="100" heightPC="20" fontSize="30" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>getPageInfo("pageTitle");</script>
		</text>
  	<text redraw="yes" offsetXPC="85" offsetYPC="12" widthPC="10" heightPC="6" fontSize="20" backgroundColor="10:105:150" foregroundColor="60:160:205">
		  <script>sprintf("%s / ", focus-(-1))+itemCount;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(annotation); annotation;</script>
		</text>
	<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy0.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy1.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy2.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy3.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy4.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy5.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy6.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy7.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy8.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy9.png</idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx) 
					{
					  location = getItemInfo(idx, "location");
					  img = getItemInfo(idx,"image");
					  annotation = getItemInfo(idx, "annotation");
					  durata = getItemInfo(idx, "durata");
					  pub = getItemInfo(idx, "pub");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "16"; else "14";
  				</script>
				</fontSize>
			  <backgroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "10:80:120"; else "-1:-1:-1";
  				</script>
			  </backgroundColor>
			  <foregroundColor>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "255:255:255"; else "140:140:140";
  				</script>
			  </foregroundColor>
			</text>

		</itemDisplay>
		
<onUserInput>
<script>
ret = "false";
userInput = currentUserInput();

if (userInput == "pagedown" || userInput == "pageup")
{
  idx = Integer(getFocusItemIndex());
  if (userInput == "pagedown")
  {
    idx -= -8;
    if(idx &gt;= itemCount)
      idx = itemCount-1;
  }
  else
  {
    idx -= 8;
    if(idx &lt; 0)
      idx = 0;
  }

  print("new idx: "+idx);
  setFocusItemIndex(idx);
	setItemFocus(0);
  redrawDisplay();
  "true";
}
ret;
</script>
</onUserInput>

	</mediaDisplay>
	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        	<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy1.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy2.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy3.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy4.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy5.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy6.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy7.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy8.png</idleImage>
		<idleImage>/tmp/usbmounts/sda1/scripts/xLiveCZ/image/busy9.png</idleImage>
		</mediaDisplay>

	</item_template>

<?php

$URL = ("http://www.tvmedicina.cz/");

if (($html = openpage($URL) ) != FALSE) {

echo "<channel>\n<title>TV Medicína - Kategorie</title>";


$videos = explode(' <li><a href = "', $html);
unset($videos[0]);
$videos = array_values($videos);
//parsovani polozek

	foreach($videos as $video) {

    $t1 = explode('onclick="LoadCategory(', $video);
    $t2 = explode(')', $t1[1]);
    $catid = $t2[0];


    $t1 = explode('>', $video);
    $t2 = explode('<', $t1[1]);
    $titulek = $t2[0];
	
	
	
	$t1 = explode('span>', $video);
    $t2 = explode('</', $t1[1]);
	$pocet = $t2[0];
	
	$lnk = "http://www.tvmedicina.cz/menu/kategorie/".$catid;
	if (($html = openpage($lnk) ) != FALSE) {
	$t1 = explode('<span class="displayNone">', $html);
    $t2 = explode('</span>', $t1[1]);
    $cat = $t2[0];
	
    IF ($catid!="") {
	
	echo "
    <item>
    <title>".$titulek."</title>
	<annotation>".$pocet."</annotation>
	<link>http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/tvmedicina_parser.php?query=1,".$cat."</link>
    </item>
    ";
 }}

}
	$ItemsOut .= "</channel>\n</rss>";
	echo $ItemsOut;
} else {
	echo "TEST SELHAL !";
}
?>