<?php
namespace Core\Core;

/*
*---------------------------------------------------------------
* C_Model Class
*---------------------------------------------------------------
*
* Containd Methods needed for your custom model to work.
* All models must extend this Class
*/
use Core\Core\Config;
use Opis\Database\Database;
use Opis\Database\Connection;

class C_Model extends Config
{
  /*
  * @param null
  */
  public function connect()
  {
    $connection = new Connection("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
    $db = new Database($connection);
    return $db;
  }
}
