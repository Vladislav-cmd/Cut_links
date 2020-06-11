<?php
  class User extends Controller {
    // Кабинет пользователя
    public function index() {
      $user = $this->model('UserModel');

      if(isset($_POST['exit_btn'])) {
        $user->logOut();
        exit();
      }

      $this->view('user/dashboard', $user->getUser());
    }

    // функция для авторизации пользователя
    public function auth() {
      $data = [];
      if(isset($_POST['login'])) {
        $user = $this->model('UserModel');
        $data['message'] = $user->auth($_POST['login'], $_POST['pass']);
      }

      $this->view('user/auth', $data);
    }
  }
