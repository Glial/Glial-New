<?php

\Glial\Synapse\FactoryController::addNode("Layout", "header");

echo '<div id="page">';

echo "<div id=\"title\">";
echo "<h2>".$GLIALE_TITLE."<br />";
//echo "<span><a href=\"".WWW_ROOT."\">".__("Home")."</a> ".$GLIALE_ARIANE."</span>";
echo "</h2>";
echo "</div>";

get_flash();
echo $GLIALE_CONTENT;


echo '</div>';


\Glial\Synapse\FactoryController::addNode("Layout", "footer");