Keep application folder in your /var/www/ directory.

Then Change database details in the following files:
1. sample-app/config/database.php
2. sample-app/.env

Also change the url in following file on line no. 29 in sample-app/config/app.php
'url' => 'http://localhost/sample-app/',
