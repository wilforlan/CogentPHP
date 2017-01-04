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
    // $data =  array(
    //   'user_email'          => 'admin@riby.me',
    //   'user_password'       => 'aloz2089'
    //   );
    // $response = API::post($url)
    //            ->body(http_build_query($data))
    //            ->addHeader('Content-Type','application/x-www-form-urlencoded')
    //            ->addHeader('charset', 'utf-8')
    //            ->addHeader('Accept', 'application/json')
    //            ->send();
    $response = API::get($url)
                // ->expectsJson()
                ->send();

    // return json_decode($response, JSON_PRETTY_PRINT);
    return $response;
  }


}


 ?>
