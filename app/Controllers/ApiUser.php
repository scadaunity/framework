<?php

namespace App\Controllers;

use Core\Http\Response;

/**
 *
 */
class ApiUser
{

  function __construct()
  {
    // code...
  }

  public function index($params){

    $data = [
      'users' =>  [01 => [
                        'id' => '1',
                        'name' => 'Doug',
                      ]
                  ],
                  [01 => [
                        'id' => '2',
                        'name' => 'stella',
                      ]
                  ],
    ];
    $teste = var_dump(json_encode($data));

    $response = new Response(200,$teste);
    $response->send();
  }
}
