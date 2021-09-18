<?php

namespace App\Controllers;

use Core\Http\Router;

/**
 *
 */
class DefaultController
{

  function __construct()
  {
    // code...
  }

  public function index($params){
      echo "Default Controller@index";
      Router::redirect('doug');
  }

  public function show($params){
      echo "Default Controller@show";
  }
  public function create($params){
      echo "Default Controller@create";
  }
  public function teste($params){
      echo "Default Controller@create";
  }
}
