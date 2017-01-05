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
