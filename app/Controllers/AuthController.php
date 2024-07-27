<?php

namespace App\Controllers;

use ScadaUnity\Http\Request;
use ScadaUnity\View\View;
use ScadaUnity\Notification\Email;

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
    view('components/Navbar');
    view('pages/auth/forgot',$data);
    view('template/footer',$data);
  }

  /**
   * Exibe a tela para inserir o codigo de verificação
   */
  public function emailVerify(){
    $data = [
      'title' => 'Verificar conta'
    ];

    view('template/header',$data);
    view('components/Navbar');
    view('pages/auth/email-verification',$data);
    view('template/footer',$data);

  }


  /**
   * Metodo responsavel por enviar o e-mail de recuperação de senha
   * @return string
   */
  public function sendResetPasswordByEmail(){

    $data = [
      'email' => Request::input('email'),
    ];

    /** BUSCA OS USUARIOS NO BANCO */
    $model = new UserModel();
    $users = $model->all();
    
    $validUser = null;

    foreach ($users as $user) {
      /** VERIFICA SE EXISTE EMAIL CADASTRO */
      if ($user->email === $data['email']) {
          $validUser = $user;
      }
    }

    /** USUARIO NÃO ENCONTRADO RETORNA PRA LOGIN E EXIBE UMA MENSSAGEM*/
    if (!$validUser) {
      setFlash('email','Erro, tente novamente mais tarde.');
      return redirect('/forgot');
    }

    $email = new Email();

    $body = file_get_contents(VIEWS.'pages/auth/mail/forgot.php');

    $email->add(
        'Recuperação de senha',
        //'<h3>Recuperação da sua conta '.APP_TITLE.'</h3><br><br><a href="#">Continuar a recuparação da conta</a>',
       $body,
        'teste',
        $validUser->email
    )->send(APP_TITLE,'scadaunity@gmail.com');

    //dd($email);
    if(!$email->error()){
      redirect('/email-verify');
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
      'password'  => password_hash($request->post()['password'],PASSWORD_DEFAULT) 
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
  
      $validate = validate([
        'email' => 'required',
        'password' => 'required',
      ]);

      if (!$validate) {
        return redirect('/login');
      }

    /** ARMAZENA OS PARAMETROS DA REQUISIÇÃO*/
    $email = Request::input('email');
    $password = Request::input('password');

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
      /** VERIFICA SE EMAIL CONFEREM */
      if ($user->email === $email) {
        $validUser = $user;
      }      
    }

    /** USUARIO NÃO ENCONTRADO RETORNA PRA LOGIN E EXIBE UMA MENSSAGEM*/
    if (!$validUser) {
      setFlash('invalidLogin',$errorMessage);
      return redirect('/login');
    }

    // VERIFICA A SENHA

    

    if(!password_verify($password,$validUser->password)){
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
    view('pages/auth/therms');
    view('template/footer');
  }

  /**
   * Metodo responsavel por exibir a politica de privacidade
   * @return view
   */
  public function privacy(){
    view('template/header');
    view('pages/auth/privacy');
    view('template/footer');
  }

  /**.
   * Metodo responsavel das configurações da conta
   */
  public function settings(){
    view('template/header');
    view('components/Navbar');
    view('pages/auth/settings');
    view('template/footer');
  }
}
