﻿<?php echo "<?xml version='1.0' encoding='UTF8' ?>";
$host = "http://127.0.0.1:80/media/sda1/scripts/xLiveCZ";
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = $queryArr[1];
   $tit=urldecode($queryArr[2]);
}
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
	itemXPC="8"
	itemYPC="25"
	itemWidthPC="45"
	itemHeightPC="8"
	capXPC="8"
	capYPC="25"
	capWidthPC="45"
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
		<text align="justify" redraw="yes"
          lines="8" fontSize=17
		      offsetXPC=55 offsetYPC=58 widthPC=40 heightPC=32
		      backgroundColor=0:0:0 foregroundColor=200:200:200>
			<script>print(annotation); annotation;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="55" offsetYPC="52" widthPC="18" heightPC="5" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(durata); durata;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="75" offsetYPC="52" widthPC="20" heightPC="5" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(pub); pub;</script>
		</text>
  	<text  redraw="yes" align="center" offsetXPC="0" offsetYPC="90" widthPC="100" heightPC="8" fontSize="17" backgroundColor="10:105:150" foregroundColor="100:200:255">
		  <script>print(titlu); titlu;</script>
		</text>
		<image  redraw="yes" offsetXPC=63 offsetYPC=20 widthPC=25 heightPC=30>
  <script>print(img); img;</script>
		</image>
		<idleImage> image/POPUP_LOADING_01.png </idleImage>
		<idleImage> image/POPUP_LOADING_02.png </idleImage>
		<idleImage> image/POPUP_LOADING_03.png </idleImage>
		<idleImage> image/POPUP_LOADING_04.png </idleImage>
		<idleImage> image/POPUP_LOADING_05.png </idleImage>
		<idleImage> image/POPUP_LOADING_06.png </idleImage>
		<idleImage> image/POPUP_LOADING_07.png </idleImage>
		<idleImage> image/POPUP_LOADING_08.png </idleImage>

		<itemDisplay>
			<text align="left" lines="1" offsetXPC=0 offsetYPC=0 widthPC=100 heightPC=100>
				<script>
					idx = getQueryItemIndex();
					focus = getFocusItemIndex();
					if(focus==idx)
					{
                      img = getItemInfo(idx,"image");
					  annotation = getItemInfo(idx, "annotation");
					  durata = getItemInfo(idx, "durata");
					  pub = getItemInfo(idx, "pub");
					  titlu = getItemInfo(idx, "title");
					}
					getItemInfo(idx, "title");
				</script>
				<fontSize>
  				<script>
  					idx = getQueryItemIndex();
  					focus = getFocusItemIndex();
  			    if(focus==idx) "14"; else "14";
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
	if( userInput == "two")
	{
		topUrl = "http://127.0.0.1:80/media/sda1/scripts/xLiveCZ/youtube/download.cgi?link=" + getItemInfo(getFocusItemIndex(),"download") + ";name=" + getItemInfo(getFocusItemIndex(),"name");
		dlok = loadXMLFile(topUrl);
		"true";
	}
if (userInput == "three" || userInput == "3")
   {
    jumpToLink("destination");
    "true";
}
ret;
</script>
</onUserInput>

	</mediaDisplay>
	<item_template>
		<mediaDisplay  name="threePartsView" idleImageXPC="5" idleImageYPC="5" idleImageWidthPC="8" idleImageHeightPC="10">
        <idleImage>image/POPUP_LOADING_01.png</idleImage>
        <idleImage>image/POPUP_LOADING_02.png</idleImage>
        <idleImage>image/POPUP_LOADING_03.png</idleImage>
        <idleImage>image/POPUP_LOADING_04.png</idleImage>
        <idleImage>image/POPUP_LOADING_05.png</idleImage>
        <idleImage>image/POPUP_LOADING_06.png</idleImage>
        <idleImage>image/POPUP_LOADING_07.png</idleImage>
        <idleImage>image/POPUP_LOADING_08.png</idleImage>
		</mediaDisplay>

	</item_template>

<?php
function str_between($string, $start, $end){ 
	$string = " ".$string; $ini = strpos($string,$start); 
	if ($ini == 0) return ""; $ini += strlen($start); $len = strpos($string,$end,$ini) - $ini; 
	return substr($string,$ini,$len); 
}
  function sec2hms ($sec, $padHours = false)
  {
    $hms = "";
    $hours = intval(intval($sec) / 3600);
    $hms .= ($padHours)
          ? str_pad($hours, 2, "0", STR_PAD_LEFT). ":"
          : $hours. ":";
    $minutes = intval(($sec / 60) % 60);
    $hms .= str_pad($minutes, 2, "0", STR_PAD_LEFT). ":";
    $seconds = intval($sec % 60);
    $hms .= str_pad($seconds, 2, "0", STR_PAD_LEFT);
    return $hms;
  }
$query = $_GET["query"];
if($query) {
   $queryArr = explode(',', $query);
   $page = $queryArr[0];
   $search = urlencode($queryArr[1]);
}

/*
http://gdata.youtube.com/feeds/api/users/nba/uploads?&start-index=1&max-results=25&v=2
*/
if(!$page) {
    $page = 1;
}
$p=50*($page-1)+1;
$link="http://gdata.youtube.com/feeds/api/videos?q=".$search."&orderby=published&start-index=".$p."&max-results=10&v=2";
//http://gdata.youtube.com/feeds/api/videos?q=zotac&orderby=published&start-index=11&max-results=10&v=2
$link=str_replace("&","&amp;",$link);
$html = file_get_contents($link);
echo '
	<channel>
		<title></title>
		<menu>main menu</menu>
		';
if($page > 1) { ?>
<item>
<?php
$sThisFile = 'http://127.0.0.1:80'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page-1).",";
if($search) { 
  $url = $url.$search.",".urlencode($title); 
}
?>
<title>Předchozí strana</title>
<link><?php echo $url;?></link>
<annotation>Předchozí strana</annotation>
<durata></durata>
<pub></pub>
<mediaDisplay name="threePartsView"/>
</item>
<?php } ?>
<?php
$videos = explode('<entry>', $html);
unset($videos[0]);
$videos = array_values($videos);
foreach($videos as $video) {
	$id = str_between($video,"<id>http://gdata.youtube.com/feeds/api/videos/","</id>");
	$title = str_between($video,"<title type='text'>","</title>");
	$descriere=str_between($video,"<content type='text'>","</content>");
    $durata = sec2hms(str_between($video,"duration='","'"));
	$data = str_between($video,"<updated>","</updated>");
	$data = str_replace("T"," ",$data);
	$data = str_replace("Z","",$data);
	$data=explode(" ",$data);
	$data=$data[0];
	$image = "http://i.ytimg.com/vi/".$id."/2.jpg";
	$link = "http://www.youtube.com/watch?v=".$id;
    $link="http://127.0.0.1:80/media/sda1/scripts/xLiveCZ/modules/links/yt1.php?file=".$link;
    //$link=str_replace("&","&amp;",$link);
	$name = preg_replace('/[^A-Za-z0-9_]/','_',$title).".mp4";
    echo '
    <item>
    <title>'.$title.'</title>
    <onClick>
    showIdle();
    url="'.$link.'";
    movie=getUrl(url);
    cancelIdle();
    playItemUrl(movie,10);
    </onClick>
    <download>'.$link.'</download>
    <name>'.$name.'</name>
    <annotation>'.$descriere.'</annotation>
    <image>'.$image.'</image>
    <durata>'.$durata.'</durata>
    <pub>'.$data.'</pub>
    <media:thumbnail url="'.$image.'" />
    </item>
    ';
}
?>
<item>
<?php
$sThisFile = 'http://127.0.0.1:80'.$_SERVER['SCRIPT_NAME'];
$url = $sThisFile."?query=".($page+1).",";
if($search) { 
  $url = $url.$search.",".urlencode($title); 
}
?>
<title>Další strana</title>
<link><?php echo $url;?></link>
<annotation>Další strana</annotation>
<durata></durata>
<pub></pub>
<mediaDisplay name="threePartsView"/>
</item>

</channel>
</rss>
