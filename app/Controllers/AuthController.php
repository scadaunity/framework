<?php

namespace App\Controllers;

use ScadaUnity\Framework\Http\Request;
use ScadaUnity\Framework\View\View;
use ScadaUnity\Framework\Notification\Email;

use App\Models\UserModel;

/**
 * Classe responsavel pelo controle de acesso ao sistema
 *
 */
class AuthController
{

    /**
     * Metodo responsavel por retornar a tela de login
     * @return string
     */
     public function login(){
         $data = [
             'title' => 'Login'
         ];
         view('template/header',$data);
         view('components/Navbar',$data);
         view('pages/auth/login',$data);
         view('template/footer',$data);
  }

  /**
   * Metodo responsavel por retornar a tela de registro
   * @return string
   */
  public function register(){

    $data = [
      'title' => 'Criar conta'
    ];

    view('template/header',$data);
    view('components/Navbar');
    view('pages/auth/register',$data);
    view('template/footer',$data);
  }

  /**
   * Metodo responsavel por retornar a tela de recuperação da conta
   * @return string
   */
  public function forgot(){

    $data = [
      'title' => 'Recuperar conta'
    ];

    view('template/header',$data);
    view('pages/auth/forgot',$data);
    view('template/footer',$data);
  }

  /**
   * Metodo responsavel por enviar o e-mail de recuperação de senha
   * @return string
   */
  public function sendResetPasswordByEmail(){

    // RECUPERA OS PARAMETROS DO POST
    $request = new Request();

    $data = [
      'email'     => $request->post()['email'],
    ];

    /** BUSCA OS USUARIOS NO BANCO */
    $model = new UserModel();
    $users = $model->all();
    $validUser = null;

    foreach ($users as $user) {
      /** VERIFICA SE EXISTE EMAIL CADASTRO */
      if ($user->email == $data['email']) {
          $validUser = $user;
      }
    }

    /** USUARIO NÃO ENCONTRADO RETORNA PRA LOGIN E EXIBE UMA MENSSAGEM*/
    if (!$validUser) {
      setFlash('message',$errorMessage);
      return redirect('/login');
    }

    $email = new Email();

    $email->add(
        'Recuperação de senha',
        '<h1>Olá, '.$validUser->name.'</h1><br><h3>Voce solicitou a recuperação da sua senha de acesso ao '.APP_TITLE.'</h3><br><br><a href="#">Recuperar minhs senha</a>',
        $validUser->name,
        $validUser->email
    )->send(APP_TITLE,'scadaunity@gmail.com');

    if(!$email->error()){
      redirect('/login');
    }else{
      echo $email->error()->getMessage();
    }

  }

  /**
   * Metodo responsavel criar uma conta
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
      return redirect('/login');
    }
  }

  /**
   * Metodo responsavel por destuir a seesão atual do usuario
   * @return  view
   */
  public function destroy(){
    unset($_SESSION[LOGGED]);

    redirect('/login');
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
      $errorMessage = '*Campo email obrigatorio';
      setFlash('email',$errorMessage);
      return redirect('/login');
    }

    /** VERIFICA SE O PASSWORD FOI PASSADO*/
    if (empty($password)) {
      $errorMessage = '*Campo senha obrigatorio';
      setFlash('password',$errorMessage);
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
      setFlash('invalidLogin',$errorMessage);
      return redirect('/login');
    }

    /** SALVA A SESSÃO DO USUARIO*/
    $_SESSION[LOGGED] = $validUser;

    /** REDIRECIONA PARA A HOME */
     return redirect('/home');

  }

  /**
   * Metodo responsavel por exibir os termos do serviço
   * @return view
   */
  public function therms(){
    view('template/header');
    view('auth/therms');
    view('template/footer');
  }

  /**
   * Metodo responsavel por exibir a politica de privacidade
   * @return view
   */
  public function privacy(){
    view('template/header');
    view('auth/privacy');
    view('template/footer');
  }
}
