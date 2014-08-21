<?php

// index.php

// Define the location of the site's files

define ('PHPLIB' , dirname(__FILE__) . '/phplib/' );

define ('CONTROLLERS', PHPLIB . '/controllers/');

define ('MODELS', PHPLIB . '/models/');

define ('VIEWS' , PHPLIB . '/views/' );

define ('LAYOUTS' , VIEWS . '/layouts/' );

define ('CONFIG' , PHPLIB . '/config/' );

define ('LIB' , PHPLIB . '/lib/' );


// Set some defaults for the template, view, and date

$LAYOUT = 'default.html';

$VIEW = 'home.html';

//$TEMPLATE = $default_template;

/**
* Conventions
* $_REQUEST['v'] is the view the user requests
* Later we will add more conventions here...
*/



// Find out what view to display


if(isset($_REQUEST) && isset($_REQUEST['v'])) {

	if(file_exists(VIEWS . basename($_REQUEST['v']) . '.html')) {

		$VIEW = basename($_REQUEST['v']) . '.html';

			if(file_exists(CONTROLLERS . basename($_REQUEST['v']) . '.php')) {

				include CONTROLLERS . basename($_REQUEST['v']) . '.php';
			}
			
			if(file_exists(MODELS . basename($_REQUEST['v']) . '.php')) {

				include MODELS . basename($_REQUEST['v']) . '.php';
			}
	}


	else {
	
		$VIEW = 'error404.html';

	}

}
include (LAYOUTS . $LAYOUT);

?>