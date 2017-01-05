<?php

namespace Core\Core\Build;

use Httpful\Request as API;
use Httpful\Http as Requester;
use Httpful\Mime;

/**
 *
 */
class HttpClient
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

  public function validUrl($url)
  {
    if (filter_var($url, FILTER_VALIDATE_URL)) {
      return true;
    }
    else {
      return false;
    }
  }

  public function makeRequest($url, $method = 'GET' ,$param = null)
  {
    switch ($method) {
      case 'GET':
      $response = API::get($url)
                  ->send();
          return (object)[
            'status' => true,
            'message' => 'Request Completed Successfully',
            'data' => $response
          ];
        break;
      case 'POST':
      if (!sizeof($param)) {
        return (object)[
          'status' => false,
          'message' => 'Cannot Send Empty Parameters with POST Method, Use GET Method Instead'
        ];
      }
      $response = API::post($url)
                 ->body(http_build_query($param))
                 ->addHeader('Content-Type','application/x-www-form-urlencoded')
                 ->addHeader('charset', 'utf-8')
                 ->addHeader('Accept', 'application/json')
                 ->send();
         return (object)[
           'status' => true,
           'message' => 'Request Completed Successfully',
           'data' => $response
         ];
        break;
      default:
        # code...
        break;
    }
  }
}


 ?>
