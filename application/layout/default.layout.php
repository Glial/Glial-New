<?php

use \Glial\Synapse\FactoryController;
use \Glial\I18n\I18n;

echo "<!DOCTYPE html>\n";
echo "<html lang=\"" . I18n::Get() . "\">";
echo "<head>\n";
echo "<meta charset=utf-8 />\n";
echo "<meta name=\"Keywords\" content=\"\" />\n";
echo "<meta name=\"Description\" content=\"\" />\n";
echo "<meta name=\"Author\" content=\"Aurelien LEQUOY\" />\n";
echo "<meta name=\"robots\" content=\"index,follow,all\" />\n";
echo "<meta name=\"generator\" content=\"Glial " . SITE_VERSION . "\" />\n";
//echo "<meta name=\"runtime\" content=\"[PAGE_GENERATION]\" />\n";
echo "<link rel=\"shortcut icon\" href=\"favicon.ico\" />";
echo "<!--\n\n" . SITE_LOGO;

echo "\n\n";
echo "You're reading. We're hiring.
https://www.esysteme.com/jobs/
		
Don't see something there for you? Email us iwanttowork@esysteme.com\n\n-->\n";

echo "<title>" . strip_tags($GLIALE_TITLE) . " - " . SITE_NAME . "</title>\n";
?>
<link rel="stylesheet" href="<?= CSS ?>bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" href="<?= CSS ?>caroussel.css">
<link rel="stylesheet" href="<?= CSS ?>glyphicon.css">
<link rel="stylesheet" href="<?= CSS ?>custom.css">

</head>
<body>
    <main>

        <header id="header">
            <?= FactoryController::addNode("Layout", "header", $GLIALE_TITLE); ?>
        </header>

        <aside id="notifications">
            <div class="container">
                <?= get_flash(); ?>
            </div>
        </aside>

        <section id="wrapper">
            <div class="container">

                <?php
                echo "<div id=\"title\">";
                echo "<h2>" . $GLIALE_TITLE;

//echo "<span>";<a href=\"".WWW_ROOT."\">".__("Home")."</a> ".$GLIALE_ARIANE."</span>";

                echo "</h2>";
                ?> 
                <div id="crumbs">
                    <ul>
                        <li><a href="#1"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a></li>
                        <li><a href="#2"><span class="glyphicon glyphicon-book" aria-hidden="true"></span> Documentation</a></li>
                        <li><a href="#3"><span class="glyphicon glyphicon-comment" aria-hidden="true"></span> Report a bug</a></li>
                        <li><a href="#4"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Cart (0)</a></li>
                        <li><a class="active" href="#5"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign in</a></li>

                    </ul>
                    <div style="clear:both"></div>
                </div>

                <?php
                echo "</div>";

                echo $GLIALE_CONTENT;
                ?>
            </div>
        </section>

        <footer id="footer">
            <?= FactoryController::addNode("Layout", "footer"); ?>
            <?php
            if (DEBUG) {
                FactoryController::addNode("Layout", "debug");
            }
            ?>
        </footer>
    </main>
</body>