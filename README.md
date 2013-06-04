JobQueueExample
===============


Install
-------------

Install ZendSkeletonApplication using composer:

	curl -s https://getcomposer.org/installer | php --
	php composer.phar create-project -sdev --repository-url="http://packages.zendframework.com" zendframework/skeleton-application path/to/install

or use your own ZF2 application (composer is required).

Then, add to your composer.json

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

Finally, update composer (with --dev):

	php composer.phar update --dev
