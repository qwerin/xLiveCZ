﻿<?php
require_once ("./include/browseremulator.class.php");

function openpage ($rowurl) {
	$be = new BrowserEmulator();
	$be->addHeaderLine("Referer", "http://www.metropol.cz");   // volani odkud jsi na stranku prisel. pouzij nejakou jejich vychozi stranku.
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
		<image  redraw="yes" offsetXPC=61 offsetYPC=25 widthPC=25 heightPC=50>
		<script>print(img); img;</script>
		</image>
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
   
$disk = $_GET["disk"];
$link = "http://www.metropol.cz/aktualne/";

echo "<channel>\n<title>Metropol TV</title>";
	
if (($html = openpage($link) ) != FALSE) {

	$t1 = explode('<div class="sub shows">', $html);
    $t2 = explode('<span>Zprávy</span></a>', $t1[1]);
    $pom = $t2[0];
	
$videos = explode('<li>', $pom);

unset($videos[0]);
$videos = array_values($videos);

foreach($videos as $video) {

    $t1 = explode('<a href="', $video);
    $t2 = explode('"', $t1[1]);
    $lnk = $t2[0];
   
    $t1=explode('">',$video);
    $t2=explode('</a>',$t1[1]);
    $title = $t2[0];
	
	$t1=explode('<img src="',$video);
    $t2=explode('"',$t1[1]);
    $image = $t2[0];
	
	$reklama = array("porady","videa");
	$pos = strpos($lnk, $reklama[0]);
	$pos2 = strpos($lnk, $reklama[1]);
	
	if (($pos === false) AND ($pos2 === false)){ }
  else { 
     echo "
    <item>
    <title>".$title."</title>
    <link>http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])."/metropoltv_parser.php?query=1,".$lnk.",".$disk."</link>
	<image>".$image."</image>
    </item>
    ";
    
}}



	$ItemsOut .= "</channel>\n</rss>";
	echo $ItemsOut;
} else {
	echo "TEST SELHAL !";
}
?>