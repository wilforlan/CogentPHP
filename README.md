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


	}
	 ?>
