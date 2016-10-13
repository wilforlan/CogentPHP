<?php
function autoloader($classname) {
  $lastSlash = strpos($classname, '\\') + 1;
  $classname = substr($classname, $lastSlash);
  $directory = str_replace('\\', '/', $classname);
  $filename = __DIR__ . '/' . $directory . '.php';
  require_once($filename);
}

spl_autoload_register('autoloader'); ?>
