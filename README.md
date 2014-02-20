To install a new project working with Glial :



install composer

`$ curl -sS https://getcomposer.org/installer | php

$ mv composer.phar /usr/local/bin/composer`


install a new project (install in current directory, will create a new dir)
`$ composer create-project glial/glial/new-project myproject`


update `configuration/db.config.ini.php`

update `webroot.config.php`


`cd myproject/application/webroot

php index.php administration admin_table

php index.php administration admin_init`


You are ready to work !
