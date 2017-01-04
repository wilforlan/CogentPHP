<?php

namespace Core\Core\Build;

/**
 *
 */
class Genarators
{

  public static $instance;
    public function __construct() {
        self::$instance = $this;
    }

  public static function getInstance()
  {
      if (self::$instance === null) {
          self::$instance = new self();
      }
      return self::$instance;
    }

  public  function generateController($controllerName)
  {
    if (file_exists(getcwd(). '/Controllers'.'/'.$controllerName.'Controller.php')) {
      return [
        'status' => false,
        'message' => ucfirst($controllerName).' Controller Build Not Successful, Controller Already Exist'
      ];
    }
    $templatefile = getcwd(). '/core/build/ControllerTemplate.php';
    if(file_exists($templatefile)){
      if( strpos(file_get_contents($templatefile),'controllername') !== false) {
        $newcontent = str_replace('controllername', $controllerName.'Controller', file_get_contents($templatefile));
        $controllerfile = getcwd(). '/Controllers'.'/'.$controllerName.'Controller.php';
        $newfile = fopen($controllerfile, 'w');
        file_put_contents($controllerfile,$newcontent);
        return [
          'status' => true,
          'message' => ucfirst($controllerName).' Controller Generated Successfully'
        ];
      }
      else {
        return [
          'status' => false,
          'message' => 'Controller Template File Not Found'
        ];
      }
    }
  }

  public  function generateModel($modelname)
  {
    if (file_exists(getcwd(). '/Models'.'/'.$modelname.'Model.php')) {
      return [
        'status' => false,
        'message' => ucfirst($modelname).' Model Build Not Successful, Model Already Exist'
      ];
    }
    $templatefile = getcwd(). '/core/build/ModelTemplate.php';
    if(file_exists($templatefile)){
      if( strpos(file_get_contents($templatefile),'modelname') !== false) {
        $newcontent = str_replace('modelname', $modelname.'Model', file_get_contents($templatefile));
        $controllerfile = getcwd(). '/Models'.'/'.$modelname.'Model.php';
        $newfile = fopen($controllerfile, 'w');
        file_put_contents($controllerfile,$newcontent);
        return [
          'status' => true,
          'message' => ucfirst($modelname).' Model Generated Successfully'
        ];
      }
      else {
        return [
          'status' => false,
          'message' => 'Model Template File Not Found'
        ];
      }
    }
  }
}


 ?>
