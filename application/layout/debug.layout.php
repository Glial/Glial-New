<?php

use \Glial\Synapse\FactoryController;
use \Glial\I18n\I18n;

echo "<!DOCTYPE html>\n";
echo "<html lang=\"" . I18n::Get() . "\">";
echo "<head>\n";
?>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">



<?php
echo "<link rel=\"shortcut icon\" href=\"favicon.ico\" />";
echo "<!--\n\n" . SITE_LOGO;

echo "\n\n";
echo "You're reading. We're hiring.
https://www.esysteme.com/jobs/
		
Don't see something there for you? Email us iwanttowork@esysteme.com\n\n-->\n";

echo "<title>" . strip_tags($GLIALE_TITLE) . " - " . SITE_NAME . "</title>\n";
?>
<link rel="stylesheet" href="<?= CSS ?>bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<link rel="stylesheet" href="<?= CSS ?>glyphicon.css">
<link rel="stylesheet" href="<?= CSS ?>debug.css">


</head>
<body>


    <header id="header">
        <?= FactoryController::addNode("Debug", "header", array($GLIALE_TITLE)); ?>
    </header>

    
    
    
    <div class="container-fluid">
        <div class="row">
            
            <?= FactoryController::addNode("Debug", "leftmenu", $GLIALE_TITLE); ?>
            
            

            <main class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 pt-3">
                <h1><?= $GLIALE_TITLE ?></h1>

                
                <?php echo $GLIALE_CONTENT; ?>
                
                
            </main>
        </div>
    </div>


</body>

<script type="text/javascript">
    var GLIAL_LINK = '/Glial-New/en/';
</script>
<script type="text/javascript" src="/Glial-New/js/jquery-latest.min.js"></script><!-- Loaded from GLIAL_JAVASCRIPT (configuration/javascript.config.php) -->
<script type="text/javascript" src="/Glial-New/js/tether.min.js"></script><!-- Loaded from GLIAL_JAVASCRIPT (configuration/javascript.config.php) -->
<script type="text/javascript" src="/Glial-New/js/bootstrap.min.js"></script><!-- Loaded from GLIAL_JAVASCRIPT (configuration/javascript.config.php) -->
<!-- end library javascript -->
<script type="text/javascript">
</script></html>