<?php

// Application configuration
//----------------------------------------------------------------------------------------------


// Configuration
define('CONFIGURATION', 'development');

// Application location
define('APPLICATION', 'app');

// Location of Burner core
define('BURNER', 'burner');

// Support E-Mail address
define('EMAIL', 'burnercms@gmail.com');


// End of configuration
//----------------------------------------------------------------------------------------------
require_once(BURNER . '/bootstrap.php');
\Core\Bootstrap::init();