JobQueueExample [DEPRECATED]
===============

Please see new refactor of ZendQueue [here](https://github.com/ripaclub/ZendQueue/tree/develop)


Install
-------------

Install ZendSkeletonApplication using composer:

	curl -s https://getcomposer.org/installer | php --
	php composer.phar create-project -sdev --repository-url="http://packages.zendframework.com" zendframework/skeleton-application path/to/install

or use your own ZF2 application (composer is required).

Add to your composer.json

    "repositories": [
	        {
	            "type": "vcs",
	            "url": "https://github.com/leonardograsso/JobQueueExample"
	        },
	         {
	            "type": "vcs",
	            "url": "https://github.com/loldev/ZendQueue"
	        }
	    ],

    "require-dev": {
    	"loldev/zend-queue" : "dev-develop",
    	"leonardograsso/job-queue-example" : "dev-develop"
    },

    "config" : {
    	"bin-dir": "bin"
    }

Then, update composer (using --dev):

	php composer.phar update --dev

Finally, add this module to your app (in config/application.config.php):

	<?php
	return array(
	    // This should be an array of module namespaces used in the application.
	    'modules' => array(
	        'Application', 'JobQueueExample'
	    ),

Usage
-------------

TBD
