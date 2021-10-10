<?php

namespace App\Controllers;

use Core\Http\Request;
use App\Models\UserModel;

/**
 * Classe responsavel pelo controle de acesso ao sistema
 */
class AuthController
{
  /**
   * Construtor da classe
   */
  function __construct()
  {

  }

  /**
   * Metodo responsavel por retornar a tela de login
   * @return view
   */
  public function login(){
      $data = [

      ];
      view('auth/login',$data,'none');
  }

  /**
   * Metodo responsavel por retornar a tela de registro
   * @return view
   */
  public function register(){
      $data = [

      ];
      view('auth/register',$data,'none');
  }

  /**
   * Metodo responsavel por retornar a tela de registro
   * @return view
   */
  public function createAccount(){

    $validate = validate([
      'name' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required',
    ]);

    if (!$validate) {
      return redirect('/register');
    }

    //dd($validate);
    /** ARMAZENA OS PARAMETROS DA REQUISIÇÃO*/
    $request = new Request();
    $userModel = new UserModel();

    $data = [
      'name'      => $request->post()['name'],
      'email'     => $request->post()['email'],
      'password'  => $request->post()['password']
    ];

    $user = $userModel->save($data);

    if ($user) {
      redirect('/login');
    }
  }

  /**
   * Metodo responsavel por destuir a seesão atual do usuario
   * @return  view
   */
  public function destroy(){
    unset($_SESSION[LOGGED]);

    return redirect('/');
  }

  /**
   * Metodo responsavel por autentica o usuario
   * @return [type]
   */
  public function autenticate(){
    /** ARMAZENA OS PARAMETROS DA REQUISIÇÃO*/
    $request = new Request();
    $email = $request->post()['email'];
    $password = $request->post()['password'];

    $errorMessage = 'Login invalido, por favor tente novamente';

    /** VERIFICA SE O EMAIL FOI PASSADO*/
    if (empty($email)) {
      setFlash('message',$errorMessage);
      return redirect('/login');
    }

    /** VERIFICA SE O PASSWORD FOI PASSADO*/
    if (empty($password)) {
      setFlash('message',$errorMessage);
      return redirect('/login');
    }

    /** BUSCA OS USUARIOS NO BANCO */
    $model = new UserModel();
    $users = $model->all();

    $validUser = null;

    foreach ($users as $user) {
      /** VERIFICA SE EMAIL E SENHA CONFEREM */
      if ($user->email == $email && $user->password == $password) {
          $validUser = $user;
      }
    }

    /** USUARIO NÃO ENCONTRADO RETORNA PRA LOGIN E EXIBE UMA MENSSAGEM*/
    if (!$validUser) {
      setFlash('message',$errorMessage);
      return redirect('/login');
    }

    /** SALVA A SESSÃO DO USUARIO*/
    $_SESSION[LOGGED] = $validUser;

    /** REDIRECIONA PARA A HOME */
    return redirect('home');

  }
}
