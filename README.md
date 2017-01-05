# CogentPHP
A Simple PHP Framework For Fast Project Kick Start

## Getting Started

CogentPHP uses Composer to Manage Dependencies and You need to have Composer installed on your machine to continue
If you dont already have composer,
	Download it here: http://getcomposer.org/

After Installing Composer,
Run

	git clone https://github.com/wilforlan/CogentPHP.git CogentPHP
	cd path_to_file/CogentPHP && php -S localhost:3000

OR
In your browser, Open localhost/CogentPHP

## Guide

Sample Projects Exist at:


		https://github.com/wilforlan/CogentBlog
		https://github.com/wilforlan/Automobile-Dianostic


**Routing**

Routing is a very essential part of a Web Application. CogentPHP has an simple yet elegant way of handling routing.

	We are going to explain this With an Example.

	- accountController.php

	<?php

	/** Autoloading The required Classes **/

	use Core\Core\C_Base;
	use Core\Core\Redirect;

	class IndexController extends C_Base
	  {
	  	function __construct( $tile )
	  	{
	      /** Loading the corresponding Model class **/
	  		$this->model = new $tile;
	  	}

	  	public function index()
	  	{
	      /** Initializing a index.html view Found in (Views/index.html) **/
	      Init::view('index');
	  	}

			public function pay()
	  	{
	      /** Initializing a index.html view Found in (Views/index.html) **/
	      Init::view('index');
	  	}

			public function withdraw()
	  	{
	      /** Initializing a index.html view Found in (Views/index.html) **/
	      Init::view('index');
	  	}

	}
	 ?>

To generate URL from the Above controller, We have

	localhost/account/
		The URL Maps to accountController -> index()
		Since no Method is Specified in URL, It maps it to index method by default.

	localhost/account/pay
	 	This URL Maps to accountController -> pay()
	localhost/account/withdraw
	 	This URL Maps to accountController -> withdraw()
	localhost/account/begin
	 	This results in a 404 error, Because the method begin() doesn't exist in the Class


	The URL is Case Insensitive as:

	accountController -> withdrawMoney() ==

	1. localhost/account/withdrawmoney
	2. localhost/account/withdrawMoney

		They Both Evaluate to the same Method

**Command Line**

	Available Command List:

	php cogent app:create-controller [controllerName] [options]

		controllerName 	-> Name of the Controller to be generated.
		options 				-> Generation Options
			Available Options
				withModel -> This Option Generate a Model File to the Model Directory for the corresponding Controller

	php cogent app:create-model [modelName] [options]

		modelName 			-> Name of the Model to be generated.
		options 				-> Generation Options
			Available Options
				withController -> This Option Generate a Controller File to the Controllers Directory for the corresponding Model

	php cogent app:request-url [url] [method]

		url 						-> URL that you want to make request to. Do not omit http://
		method	 				-> Request Method: Default is GET
			Available Method
			GET 	-> Send Request using GET
			POST 	-> Sends Request with POST, Using HTTP Build Query to Build Params
