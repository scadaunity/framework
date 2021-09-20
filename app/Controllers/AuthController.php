<?php

namespace App\Controllers;

use Core\Http\Request;

/**
 *
 */
class AuthController
{

  public $email = 'scadaunity@gmail.com';

  public $password = '123456';

  function __construct()
  {
    // code...
  }

  public function login(){
      $data = [

      ];
      view('auth/login');
  }

  public function logout(){
      $data = [

      ];
      return redirect('login');
  }

  public function autenticate(){
    $request = new Request();
    $email = $request->post()['email'];
    $password = $request->post()['password'];


    if ($email == $this->email && $password == $this->password) {
      return redirect('home');
    } else{
      return redirect('login');
    }



  }
}
