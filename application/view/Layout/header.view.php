<?php

use \Glial\I18n\I18n;

echo "<!DOCTYPE html>\n";
echo "<html lang=\"" . I18n::Get() . "\">";

echo "<head>\n";
echo "<meta charset=utf-8 />\n";
echo "<meta name=\"Keywords\" content=\"Etrildidae,Estrildidés,????,????????????,forum,news,photos,videos,[PAGE_KEYWORDS]\" />\n";
echo "<meta name=\"Description\" content=\"[PAGE_DESCRIPTION]\" />\n";
echo "<meta name=\"Author\" content=\"Aurelien LEQUOY\" />\n";
echo "<meta name=\"robots\" content=\"index,follow,all\" />\n";
echo "<meta name=\"generator\" content=\"GLIALE 1.1\" />\n";
echo "<meta name=\"runtime\" content=\"[PAGE_GENERATION]\" />\n";


//echo "<link rel=\"shortcut icon\" href=\"pictures/main/favicon.ico\" />";


echo "<title>" . $GLIALE_TITLE . " - Estrildidae</title>\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS . "style.css\" />\n";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS . "extjs.css\" />\n";
//echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"" . CSS . "metro.css\" />\n";
echo '<link type="text/css" href="http://fonts.googleapis.com/css?family=Coda" rel="stylesheet" />';

?>
</head>


<body>


<div class="metrouicss" id="all">


<div id="headline">

</div>
		<div id="banner">
			<div class="terre">
				<img src="<?php echo IMG; ?>main/terre.png" height="40" width="40" />
			</div>
		</div>
		<div id="menu">
		
		
<?php


$menu = array(__("Home"), __("Species"), __("Stock"), __("Authors"),__("Medias"), __("Members"), __("Who we are?"), __("FAQ"), __("Partner"), __("Download"), __("Contact us"), __("Forum"));
$link = array("home/", "species/family/Estrildidae", "stock/", "author/","media/", "user/", "who_we_are/", "faq/", "partner/", "download/", "contact_us/", "forum/");

echo "<ul class=\"menu\">";



$i = 0;
foreach ($menu as $value)
{

	$tmp = explode("/", $link[$i]);

	if (strstr($_GET['url'], $tmp[0]) || ($_GET['url'] === "home/index/" && $i === 0))
	{
		$selected = "selected";
	}
	else
	{
		$selected = "";
	}
	echo "<li><a class=\"" . $selected . "\" href=\"" . LINK . $link[$i] . "\">" . $value . "</a></li>";
	$i++;
}



if (strstr($_GET['url'], "search/"))
{
	$selected = "selected";
}
else
{
	$selected = "";
}



echo "<li><form method=\"post\" action=\"" . LINK . "search/\"><span class=\"" . $selected . "\"><a href=\"" . LINK . "search/\">" . __("Search") . "</a>&nbsp;
	" . input("google_search", "key_words") . "
	</span></form></li>";
echo "</ul>";

echo "</div>";
echo "<div id=\"main\">";

echo "<div id=\"login\">";

echo "<div style=\"float:right;\">
		
		<div style=\"float:left; line-height:18px\">" . __("Language") . " :&nbsp;</div>
		<ul id=\"langage\">";
echo "<li class=\"top\"><span class=\"item_lg\"><img src=\"" . IMG . "language/" . I18n::Get() . ".gif\" width=\"18\" height=\"12\" border=\"0\" />
		<span id=\"lg_main\"> " . I18n::$languagesUTF8[I18n::Get()] . "</span></span><ul class=\"sub\">\n";


$lg = explode(",", LANGUAGE_AVAILABLE);
$nbchoice = count($lg);

for ($i = 0; $i < $nbchoice; $i++)
{


	if ($lg[$i] != I18n::Get())
		echo "<li><a href=\"" . WWW_ROOT . $lg[$i] . "/" . $_GET['url'] . "\"><img class=\"" . $lg[$i] . "\" src=\"" . IMG . "main/1x1.png\" width=\"18\" height=\"12\" border=\"0\" /> " . I18n::$languagesUTF8[$lg[$i]] . "</a></li>\n";
}

echo "</ul>";
echo "</li>";
echo "</ul></div>";


\glial\synapse\FactoryController::addNode("user",  "login", "");




/*
  for($i=0; $i< $nbchoice; $i++)
  {
  echo $_LG_choice[$i]." - ".base64_encode(fread(fopen(ROOT."/app/webroot/image/language/".$_LG_choice[$i].".gif", "r"), filesize(ROOT."/app/webroot/image/language/".$_LG_choice[$i].".gif")))."<br />";

  }
 */
?>
		</div>
		<div id="content">