<?php

/*
*---------------------------------------------------------------
* CogentPHP ADS Developed by Williams Isaac
*---------------------------------------------------------------
*
*Include the neccesary Class (Init) For intialization of the System
*Note:: This Index will not work without the include file set to the right path!
*/

require 'core/app.php';
require 'vendor/autoload.php';
require 'LoadCore.php';


$app = new Init;

define('ENVIRONMENT', 'production');
/*
*---------------------------------------------------------------
* ERROR REPORTING
*---------------------------------------------------------------
*
* Different environments will require different levels of error reporting.
* By default development will show errors but testing and live will hide them.
*/

if (defined('ENVIRONMENT'))
	{
		switch (ENVIRONMENT)
			{
				case 'development':
					error_reporting(E_ALL);
				break;

				case 'testing':
				case 'production':
					error_reporting(0);
				break;

				default:
					exit('The application environment is not set correctly.');
			}
	}



/**
 *Run checks for server path
 */

if (isset($_SERVER['PATH_INFO']))

	{

		/**
		 *Set var $path to Predefined $_SERVER['PATH_INFO']
		 */

		$path = $_SERVER['PATH_INFO'];

		/**
		 *Split result or Sever path request into Array
		 *@return $path;
		 */
		$server = $app->path_split($path);
	}

/*
Assign default '/' if previous check result to False
*/
else
	{

		/**
		 *Set path to '/'
		 */
		$server = '/';

	}

switch (Init::is_slash($server))
{
	case true:

		require_once __DIR__.'/Models/indexModel.php';
    require_once __DIR__.'/Controllers/indexController.php';

        $app->req_model = new IndexModel();
        $app->req_controller = new IndexController($app->req_model);
				/**
				 *Model and Controller assignment with first letter as UPPERCASE
				 *@return Class;
				 */
		        $model = $app->req_model;
		        $controller = $app->req_controller;

		    /**
				 *Creating an Instance of the the model and the controller each
				 *@return Object;
				 */
		        $ModelObj = new $model;
		        $ControllerObj = new $controller($app->req_model);

		   /**
				 *Assigning Object of Class Init to a Variable, to make it Usable
				 *@return Method Name;
				 */
		        $method = $app->req_method;

		   /**
				 *Check if Controller Exist is not empty, then performs an
				 *action on the method;
				 *@return true;
				 */
		        if ($app->req_method != '')
	            {

	       /**
					 *Outputs The Required controller and the req *method respectively
					 *@return Required Method;
					 */

	                print $ControllerObj->$method($app->req_param);

	            }
	            else
	            {
	            	/**
					 *This works in only when the Url doesnt have a parameter
					 *@return void;
					 */
	            	print $ControllerObj->index();
	            }

		break;

	case false:

		/**
		 *Set Required Controller name ;
		 *@return controller;
		 *
		 */
		$app->req_controller = $server[1];

		/**
		 *Set Required Model name
		 *@return model;
		 */
		$app->req_model = $server[1];

		/**
		 *Set Required Method name
		 *@return method;
		 */
		$app->req_method = isset($server[2])? $server[2] :'';

		/**
		 *Set Required Params
		 *@return params;
		 */
		$app->req_param = array_slice($server, 3);

		/**
		 *Check if Controller Exist
		 *@return void;
		 */
		$req_controller_exists = __DIR__.'/Controllers/'.$app->req_controller.'Controller.php';

		if (file_exists($req_controller_exists))
		{
			/**
			 *Requiring all the files needed i.e The Corresponding Model and Controller
			 *@return corresponding class respectively;
			 */
			require_once __DIR__.'/Models/'.$app->req_model.'Model.php';
	    require_once __DIR__.'/Controllers/'.$app->req_controller.'Controller.php';

	    /**
			 *Model and Controller assignment with first letter as UPPERCASE
			 *@return Class;
			 */
	        $model = ucfirst($app->req_model).'Model';
	        $controller = ucfirst($app->req_controller).'Controller';

	    /**
			 *Creating an Instance of the the model and the controller each
			 *@return Object;
			 */
	        $ModelObj = new $model;
	        $ControllerObj = new $controller(ucfirst($app->req_model.'Model'));

	   /**
			 *Assigning Object of Class Init to a Variable, to make it Usable
			 *@return Method Name;
			 */
	        $method = $app->req_method;

	   /**
			 *Check if Controller Exist is not empty, then performs an
			 *action on the method;
			 *@return true;
			 */
	        if ($app->req_method != '')
            {

       /**
				 *Outputs The Required controller and the req *method respectively
				 *@return Required Method;
				 */

                print $ControllerObj->$method($app->req_param);

            }
            else
            {
            	/**
				 *This works in only when the Url doesnt have a parameter
				 *@return void;
				 */
				 				print $ControllerObj->index();

            }

		}
		else
		{
			header('HTTP/1.1 404 Not Found');
            die('404 - The file - '.$app->req_controller.' - not found');
            //require the 404 controller and initiate it
            //Display its view
		}




		break;

	default:
		print 'An Error Occured';

		break;
}
