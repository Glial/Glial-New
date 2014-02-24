<?php

if (in_array("mod_rewrite",apache_get_modules()))
{
	echo "the mod_rewrite is enabled but you a missconfiguration with .htaccess or vhost<br />";
	echo "if you use .htaccess (only for dev) think to replace 'AllowOverRide None' by 'Allow OverRide All'<br/>";
	echo "if you use vhost the target is not the good one and shoud be in /www/my_project/application/webroot and not in /www/my_project/";
}
else
{
	echo "mod_rewrite is not enabled launch : a2enmod rewrite</br>";
	echo "service apache2 restart<br />";
}
